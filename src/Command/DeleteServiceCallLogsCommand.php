<?php

namespace App\Command;

use App\Entity\CustomerService\ServiceCallLog;
use App\Repository\CustomerService\ServiceCallLogRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpKernel\KernelInterface;

class DeleteServiceCallLogsCommand extends Command
{
    protected static $defaultName = 'app:delete-service-call-logs';
    protected static $defaultDescription = 'Add a short description for your command';
    /**
     * @var EntityManagerInterface
     */
    private $customerServiceEntityManager;


    public function __construct(EntityManagerInterface $customerServiceEntityManager)
    {
        parent::__construct();

        $this->customerServiceEntityManager = $customerServiceEntityManager;
    }

    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $this->customerServiceEntityManager->getConnection()->getConfiguration()->setSQLLogger(null);

        $callLogRepo = $this->customerServiceEntityManager->getRepository(ServiceCallLog::class);
        $logCount = $callLogRepo->count([]);

        $io->progressStart($logCount);
        $buffer = 1000;
        $count = 0;

        $callLogIds = $callLogRepo->findIds();

        foreach ($callLogIds as $id){
            $callLog = $callLogRepo->find($id);
            $this->customerServiceEntityManager->remove($callLog);

            $io->progressAdvance();
            $count++;
            if ($count == $buffer){
                $count = 0;
                $this->customerServiceEntityManager->flush();
            }
        }
        $this->customerServiceEntityManager->flush();
        $this->customerServiceEntityManager->clear();

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
