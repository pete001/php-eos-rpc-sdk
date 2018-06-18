<?php

namespace BlockMatrix\EosRpc\Adapter\Settings;

interface SettingsInterface
{
    /**
     * Fetch the RPC Node
     *
     * @return string
     */
    public function rpcNode(): string;
}
