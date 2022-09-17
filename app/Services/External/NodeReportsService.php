<?php

namespace App\Services\External;

use Exception;
use GuzzleHttp\Client;
class NodeReportsService
{
    public static function deleteReports()
    {
        $baseUrl = config('app.node_url');

        $client = new Client([
            'base_uri' => $baseUrl
        ]);

        try {
            $response = $client->delete('/reports/delete');

            if ($response->getStatusCode() === 204) {
                \Log::info("Relatorios excluidos com sucesso!");
            }
        } catch (Exception $e) {
           \Log::error("Não foi possível excluir os relatórios: ".$e->getMessage());
        }
    }
}
