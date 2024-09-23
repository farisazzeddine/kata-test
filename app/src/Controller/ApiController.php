<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\ApiCaller; 
class ApiController extends AbstractController
{
    private ApiCaller $apiCaller;

    public function __construct(ApiCaller $apiCaller)
    {
        $this->apiCaller = $apiCaller;
    }
 
    #[Route('/', name: 'home')]
    public function app(): Response
    {
      return $this->render('app.html.twig');
    }
    //fetch all products
    #[Route('/api/products', name: 'api_products')]
    public function apiProducts(): Response
    {
        try {
            $apiUrl = 'https://fakestoreapi.com/products';
            $response = $this->apiCaller->callApi($apiUrl);
    
            // Validate the response before processing
            if (!$response || !is_string($response)) {
                throw new Exception('Invalid response received from API.');
            }
    
            return new JsonResponse(json_decode($response));
        } catch (Exception $e) {
            // Handle the exception gracefully
            return response()->json([
                'error' => $e->getMessage(),
            ], 500); // Internal Server Error
        }
    }
    //fetch product by id
    #[Route('/api/product/{id}', name: 'api_product')]
    public function apiProduct(int $id): Response
    { 
        try {
            $apiUrl = sprintf('https://fakestoreapi.com/products/%s', $id);
            $response = $this->apiCaller->callApi($apiUrl);
    
            // Validate the response before processing
            if (!$response || !is_string($response)) {
                throw new Exception('Invalid response received from API.');
            }
    
            return new JsonResponse(json_decode($response));
        } catch (Exception $e) {
            // Handle the exception gracefully
            return response()->json([
                'error' => $e->getMessage(),
            ], 500); // Internal Server Error
        }
    }
}
