<?php
namespace JP\AwsBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class SubscriptionsConsumerCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:consumer:subscriptions')
            ->setDescription('Consumes subscriptions from AWS SQS')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \AWS\Sqs\SqsClient $awsSqsClient */
        $awsSqsClient = $this->getContainer()->get('aws.sqs');
        $queue = $awsSqsClient->getQueueUrl(['QueueName' => 'lacentrale-subscriptions']);

        $parameters = [
            'QueueUrl' => $queue['QueueUrl'],
        ];

        $result = $awsSqsClient->receiveMessage($parameters);

        if ($result['Messages'] == null) {
            return $output->writeln('No message to process');
        }

        $message = array_pop($result['Messages']);
        $handle = $message['ReceiptHandle'];
        $message = json_decode($message['Body']);

        $output->writeln(sprintf('Processing %s', $message->name));

        $awsSqsClient->deleteMessage(array(
             'QueueUrl'      => $queue['QueueUrl'],
             'ReceiptHandle' => $handle,
         ));

        $output->writeln('end');
    }
}