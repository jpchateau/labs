<?php
namespace JP\AwsBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class SubscriptionsPublisherCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:publisher:subscriptions')
            ->setDescription('Publishes random subscriptions to AWS SQS')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \AWS\Sqs\SqsClient $awsSqsClient */
        $awsSqsClient = $this->getContainer()->get('aws.sqs');

        $queueUrl = 'https://sqs.eu-west-1.amazonaws.com/535067210092/lacentrale-subscriptions';

        //echo $awsSqsClient->listQueues();

        for ($i = 1; $i <= 100; $i++) {
            $customer = [
                'name' => 'Dupont ' . $i,
                'age'  => rand(1, 99),
            ];
            $parameters = [
                'MessageBody' => json_encode($customer),
                'QueueUrl' => $queueUrl,
            ];

            $awsSqsClient->sendMessage($parameters);
            sleep(2);
        }

        $output->writeln('end');
    }
}