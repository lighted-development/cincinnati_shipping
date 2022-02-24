<?php

namespace App\Command;

use App\Entity\CustomerService\ServiceCallLog;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpKernel\KernelInterface;

class ImportServiceCallLogCommand extends Command
{
    protected static $defaultName = 'app:import-service-call-log';
    protected static $defaultDescription = 'Add a short description for your command';
    /**
     * @var EntityManagerInterface
     */
    private $customerServiceEntityManager;

    private $fileName;

    /**
     * ImportServiceCallLogCommand constructor.
     * @param EntityManagerInterface $customerServiceEntityManager
     * @param KernelInterface $kernel
     */
    public function __construct(EntityManagerInterface $customerServiceEntityManager, KernelInterface $kernel)
    {
        parent::__construct();

        $this->customerServiceEntityManager = $customerServiceEntityManager;
        $this->fileName = $kernel->getProjectDir().'/public/data/service_call_log.csv';
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->customerServiceEntityManager->getConnection()->getConfiguration()->setSQLLogger(null);

        $reader = Reader::createFromPath($this->fileName);
        $headers = [
            'id',
            'rep',
            'calldate',
            'calltime',
            'dlrCode',
            'contact',
            'a1',
            'a2',
            'a3',
            'a4',
            'ba',
            'bc',
            'bd',
            'bg',
            'bi',
            'bm',
            'bt',
            'c',
            'd',
            'e',
            'f',
            'g',
            'h',
            'i',
            'j',
            'comments',
            'followup'
        ];
        $reader->setOffset(1);
        $results = $reader->fetchAssoc($headers);

        $io->progressStart(iterator_count($results));

        $buffer = 50;
        $count = 0;
        foreach($results as $row){
            $serviceCallLog = (new ServiceCallLog())
                ->setRep(trim($row['rep']))
                ->setCallDate((trim($row['calldate']) == '')? null : date_create_from_format('n/j/Y', trim($row['calldate'])))
                ->setCallTime((trim($row['calltime']) == '')? null : date_create_from_format('g:i:s A', trim($row['calltime'])))
                ->setDlrCode(trim($row['dlrCode']))
                ->setContact(trim($row['contact']))
                ->setA1((int)trim($row['a1']))
                ->setA2((int)trim($row['a2']))
                ->setA3((int)trim($row['a3']))
                ->setA4((int)trim($row['a4']))
                ->setBa((int)trim($row['ba']))
                ->setBc((int)trim($row['bc']))
            ;
            $serviceCallLog->setBd((int)trim($row['bd']))
                ->setBg((int)trim($row['bg']))
                ->setBi((int)trim($row['bi']))
                ->setBm((int)trim($row['bm']))
                ->setBt((int)trim($row['bt']))
                ->setC((int)trim($row['c']))
                ->setD((int)trim($row['d']))
                ->setE((int)trim($row['e']))
            ;
            $serviceCallLog->setF((int)trim($row['f']))
                ->setG((int)trim($row['g']))
                ->setH((int)trim($row['h']))
                ->setI((int)trim($row['i']))
                ->setJ((int)trim($row['j']))
                ->setComments(trim($row['comments']))
                ->setFollowup((trim($row['followup']) == 'TRUE')? true : false)
            ;
            $this->customerServiceEntityManager->persist($serviceCallLog);

            $io->progressAdvance();
            $count++;
            if ($count == $buffer){
                $count = 0;
                $this->customerServiceEntityManager->flush();
                $this->customerServiceEntityManager->clear();
            }
        }
        $this->customerServiceEntityManager->flush();
        $this->customerServiceEntityManager->clear();

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
