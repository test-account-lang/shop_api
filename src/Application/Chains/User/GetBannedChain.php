<?php
/**
 * User: Wajdi Jurry
 * Date: 2020/10/16
 * Time: 12:25
 */

namespace App\Application\Chains\User;


use App\Application\Chains\AbstractChain;
use App\Application\Handlers\User\GetBanned;
use App\Utilities\RequestSenderInterface;
use Psr\Log\LoggerInterface;

class GetBannedChain extends AbstractChain
{
    /**
     * @var RequestSenderInterface
     */
    private $requestSender;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * GetBannedChain constructor.
     * @param RequestSenderInterface $requestSender
     * @param LoggerInterface $logger
     */
    public function __construct(RequestSenderInterface $requestSender, LoggerInterface $logger)
    {
        $this->requestSender = $requestSender;
        $this->logger = $logger;
    }

    public function initiate()
    {
        $handlers = new GetBanned($this->requestSender);

        $this->handlers = $handlers;

        return $this;
    }
}