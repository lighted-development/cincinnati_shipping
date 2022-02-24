<?php

namespace App\Command;

use App\Entity\Main\BatchControlLtl;
use App\Entity\Main\BatchControlSd;
use App\Entity\Main\BatchControlVor;
use App\Entity\Main\Criteria;
use App\Entity\Main\DealerInvoice;
use App\Entity\Main\Employee;
use App\Entity\Main\Main;
use App\Entity\Main\MainBackup;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\KernelInterface;

class ImportDataCommand extends Command
{
    private $ltlBatchFolder;
    private $sdBatchFolder;
    private $vorBatchFolder;
    private $criteriaFolder;
    private $dealerInvoiceFolder;
    private $employeeFolder;
    private $mainFolder;
    private $mainBackupFolder;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(KernelInterface $kernel, EntityManagerInterface $em)
    {
        parent::__construct();
        $dataDirectory = $kernel->getProjectDir().'/public/data';
        $this->ltlBatchFolder = $dataDirectory.'/BatchControlLtl';
        $this->sdBatchFolder = $dataDirectory.'/BatchControlSd';
        $this->vorBatchFolder = $dataDirectory.'/BatchControlVor';
        $this->criteriaFolder = $dataDirectory.'/Criteria';
        $this->dealerInvoiceFolder = $dataDirectory.'/DealerInvoice';
        $this->employeeFolder = $dataDirectory.'/Employee';
        $this->mainFolder = $dataDirectory.'/Main';
        $this->mainBackupFolder = $dataDirectory.'/MainBackup';
        $this->em = $em;
    }

    protected static $defaultName = 'app:import-data';
    protected static $defaultDescription = 'Add a short description for your command';

    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $this->em->getConnection()->getConfiguration()->setSQLLogger(null);

        # Start Batch control Ltl
        $io->info('start batch control ltl');
        $headers = [
            'picker',
            'lines',
            'date'
        ];
        $finder = new Finder();
        $finder->files()->in($this->ltlBatchFolder);

        /** @var \SplFileInfo $file */
        foreach ($finder as $file){
            $fileName = '/'.$file->getFilename();
            $reader = Reader::createFromPath($this->ltlBatchFolder.$fileName);
            $reader->setOffset(1);
            $results = $reader->fetchAssoc($headers);

            $io->progressStart(iterator_count($results));
            $count = 0;
            $buffer = 500;
            foreach ($results as $row){
                $linePicker = trim($row['picker']);
                $lines = trim($row['lines']);
                $date = (trim($row['date']) == '')? null : date_create_from_format('n/j/Y', trim($row['date']));
                $ltlBatch = (new BatchControlLtl())
                    ->setLtlPicker($linePicker)
                    ->setLtlLines($lines)
                    ->setDate($date)
                ;
                $this->em->persist($ltlBatch);

                $count++;
                $io->progressAdvance();
                if ($count == $buffer){
                    $count = 0;
                    $this->em->flush();
                    $this->em->clear();
                }
            }
            $this->em->flush();
            $this->em->clear();
        }

        # Start Batch control Sd
        $io->info('start batch control Sd');
        $headers = [
            'picker',
            'lines',
            'date'
        ];
        $finder = new Finder();
        $finder->files()->in($this->sdBatchFolder);

        /** @var \SplFileInfo $file */
        foreach ($finder as $file){
            $fileName = '/'.$file->getFilename();
            $reader = Reader::createFromPath($this->sdBatchFolder.$fileName);
            $reader->setOffset(1);
            $results = $reader->fetchAssoc($headers);

            $io->progressStart(iterator_count($results));
            $count = 0;
            $buffer = 500;
            foreach ($results as $row){
                $linePicker = trim($row['picker']);
                $lines = trim($row['lines']);
                $date = (trim($row['date']) == '')? null : date_create_from_format('n/j/Y', trim($row['date']));
                $sdBatch = (new BatchControlSd())
                    ->setSdPicker($linePicker)
                    ->setSdLines($lines)
                    ->setDate($date)
                ;
                $this->em->persist($sdBatch);

                $count++;
                $io->progressAdvance();
                if ($count == $buffer){
                    $count = 0;
                    $this->em->flush();
                    $this->em->clear();
                }
            }
            $this->em->flush();
            $this->em->clear();
        }

        # Start Batch control Vor
        $io->info('start batch control vor');
        $headers = [
            'picker',
            'lines',
            'date'
        ];
        $finder = new Finder();
        $finder->files()->in($this->vorBatchFolder);

        /** @var \SplFileInfo $file */
        foreach ($finder as $file){
            $fileName = '/'.$file->getFilename();
            $reader = Reader::createFromPath($this->vorBatchFolder.$fileName);
            $reader->setOffset(1);
            $results = $reader->fetchAssoc($headers);

            $io->progressStart(iterator_count($results));
            $count = 0;
            $buffer = 500;
            foreach ($results as $row){
                $linePicker = trim($row['picker']);
                $lines = trim($row['lines']);
                $date = date_create_from_format('n/j/Y', trim($row['date']));
                $vorBatch = (new BatchControlVor())
                    ->setVorPicker($linePicker)
                    ->setVorLines($lines)
                    ->setDate($date)
                ;
                $this->em->persist($vorBatch);

                $count++;
                $io->progressAdvance();
                if ($count == $buffer){
                    $count = 0;
                    $this->em->flush();
                    $this->em->clear();
                }
            }
            $this->em->flush();
            $this->em->clear();
        }

        # Start criteria
        $io->info('start Criteria');
        $headers = [
            'dealerInvoice',
            'employeeNum',
            'closed',
            'closedTime'
        ];
        $finder = new Finder();
        $finder->files()->in($this->criteriaFolder);

        /** @var \SplFileInfo $file */
        foreach ($finder as $file){
            $fileName = '/'.$file->getFilename();
            $reader = Reader::createFromPath($this->criteriaFolder.$fileName);
            $reader->setOffset(1);
            $results = $reader->fetchAssoc($headers);

            $io->progressStart(iterator_count($results));
            $count = 0;
            $buffer = 500;
            foreach ($results as $row){
                $dealerInvoice = trim($row['dealerInvoice']);
                $employeeNum = trim($row['employeeNum']);
                $closed = (bool) trim($row['closed']);
                $closedTime = (trim($row['closedTime']) == '')? null : date_create_from_format('n/j/Y', trim($row['closedTime']));
                $criteria = (new Criteria())
                    ->setDealerInvoice($dealerInvoice)
                    ->setEmployeeNum($employeeNum)
                    ->setClosed($closed)
                    ->setClosedTime($closedTime)
                ;
                $this->em->persist($criteria);

                $count++;
                $io->progressAdvance();
                if ($count == $buffer){
                    $count = 0;
                    $this->em->flush();
                    $this->em->clear();
                }
            }
            $this->em->flush();
            $this->em->clear();
        }

        # Start dealer invoice
        $io->info('start dealer invoice');
        $headers = [
            'dealerInvoice',
            'comments'
        ];
        $finder = new Finder();
        $finder->files()->in($this->dealerInvoiceFolder);

        /** @var \SplFileInfo $file */
        foreach ($finder as $file){
            $fileName = '/'.$file->getFilename();
            $reader = Reader::createFromPath($this->dealerInvoiceFolder.$fileName);
            $reader->setOffset(1);
            $results = $reader->fetchAssoc($headers);

            $io->progressStart(iterator_count($results));
            $count = 0;
            $buffer = 500;
            foreach ($results as $row){
                $dealerInvoice = trim($row['dealerInvoice']);
                $comments = trim($row['comments']);
                $dealerInvoiceEntity = (new DealerInvoice())
                    ->setInvoice($dealerInvoice)
                    ->setComments($comments)
                ;
                $this->em->persist($dealerInvoiceEntity);

                $count++;
                $io->progressAdvance();
                if ($count == $buffer){
                    $count = 0;
                    $this->em->flush();
                    $this->em->clear();
                }
            }
            $this->em->flush();
            $this->em->clear();
        }

        # start employee
        $io->info('start employee');
        $headers = [
            'empNum',
            'fName',
            'lName'
        ];
        $finder = new Finder();
        $finder->files()->in($this->employeeFolder);

        /** @var \SplFileInfo $file */
        foreach ($finder as $file){
            $fileName = '/'.$file->getFilename();
            $reader = Reader::createFromPath($this->employeeFolder.$fileName);
            $reader->setOffset(1);
            $results = $reader->fetchAssoc($headers);

            $io->progressStart(iterator_count($results));
            $count = 0;
            $buffer = 500;
            foreach ($results as $row){
                $employeeNum = trim($row['empNum']);
                $fName = trim($row['fName']);
                $lName = trim($row['lName']);
                $employee = (new Employee())
                    ->setEmpNum($employeeNum)
                    ->setFName($fName)
                    ->setLName($lName)
                ;
                $this->em->persist($employee);

                $count++;
                $io->progressAdvance();
                if ($count == $buffer){
                    $count = 0;
                    $this->em->flush();
                    $this->em->clear();
                }
            }
            $this->em->flush();
            $this->em->clear();
        }

        # start main
        $io->info('start main');
        $headers = [
            'dealerInvoice',
            'comments',
            'empNum',
            'fName',
            'lName',
            'asgnDate',
            'asgnTime',
            'closed',
            'closedTime',
            'ordType'
        ];
        $finder = new Finder();
        $finder->files()->in($this->mainFolder);

        /** @var \SplFileInfo $file */
        foreach ($finder as $file){
            $fileName = '/'.$file->getFilename();
            $reader = Reader::createFromPath($this->mainFolder.$fileName);
            $reader->setOffset(0);
            $results = $reader->fetchAssoc($headers);

            $io->progressStart(iterator_count($results));
            $count = 0;
            $buffer = 500;
            foreach ($results as $row){

                $dealerInvoice = trim($row['dealerInvoice']);
                $comments = trim($row['comments']);
                $empNum = trim($row['empNum']);
                $fName = trim($row['fName']);
                $lName = trim($row['lName']);
                $asgnDate = (trim($row['asgnDate']) == '')? null : date_create_from_format('n/j/Y g:i', trim($row['asgnDate']));
                $asgnTime = (trim($row['asgnTime']) == '')? null : date_create_from_format('g:i:s A', trim($row['asgnTime']));
                $closed = (bool) trim($row['closed']);
                $closedTime = (trim($row['closedTime']) == '')? null : date_create_from_format('n/j/Y g:i', trim($row['closedTime']));
                $orderType = trim($row['ordType']);
                $main = (new Main())
                    ->setDealerInvoice($dealerInvoice)
                    ->setComment($comments)
                    ->setEmpNum($empNum)
                    ->setFName($fName)
                    ->setLName($lName)
                    ->setAsgnDate($asgnDate)
                    ->setAsgnTime($asgnTime)
                    ->setClosed($closed)
                    ->setOrdType($orderType)
                ;
                if ($closedTime){
                    $main->setClosedTime($closedTime);
                }
                $this->em->persist($main);
                $count++;
                $io->progressAdvance();
                if ($count == $buffer){
                    $count = 0;
                    $this->em->flush();
                    $this->em->clear();
                }
            }
            $this->em->flush();
            $this->em->clear();

        }

        # start main backup
        $io->info('start main backup');
        $headers = [
            'dealerInvoice',
            'comments',
            'empNum',
            'fName',
            'lName',
            'asgnDate',
            'asgnTime',
            'closed',
            'closedTime',
            'ordType'
        ];
        $finder = new Finder();
        $finder->files()->in($this->mainBackupFolder);

        /** @var \SplFileInfo $file */
        foreach ($finder as $file){
            $fileName = '/'.$file->getFilename();
            $reader = Reader::createFromPath($this->mainBackupFolder.$fileName);
            $reader->setOffset(0);
            $results = $reader->fetchAssoc($headers);

            $io->progressStart(iterator_count($results));
            $count = 0;
            $buffer = 500;
            foreach ($results as $row){
                $dealerInvoice = trim($row['dealerInvoice']);
                $comments = trim($row['comments']);
                $empNum = trim($row['empNum']);
                $fName = trim($row['fName']);
                $lName = trim($row['lName']);
                $asgnDate = (trim($row['asgnDate']) == '')? null : date_create_from_format('n/j/Y g:i', trim($row['asgnDate']));
                $asgnTime = (trim($row['asgnTime']) == '')? null : date_create_from_format('g:i:s A', trim($row['asgnTime']));
                $closed = (bool) trim($row['closed']);
                $closedTime = (trim($row['closedTime']) == '')? null : date_create_from_format('n/j/Y g:i', trim($row['closedTime']));
                $orderType = trim($row['ordType']);
                $mainBackup = (new MainBackup())
                    ->setDealerInvoice($dealerInvoice)
                    ->setComment($comments)
                    ->setEmpNum($empNum)
                    ->setFName($fName)
                    ->setLName($lName)
                    ->setAsgnDate($asgnDate)
                    ->setAsgnTime($asgnTime)
                    ->setClosed($closed)
                    ->setOrdType($orderType)
                ;

                if ($closedTime){
                    $mainBackup->setClosedTime($closedTime);
                }
                $this->em->persist($mainBackup);

                $count++;
                $io->progressAdvance();
                if ($count == $buffer){
                    $count = 0;
                    $this->em->flush();
                    $this->em->clear();
                }
            }
            $this->em->flush();
            $this->em->clear();
        }

        return Command::SUCCESS;
    }
}
