<?php

namespace HoaVi\GlideLaravel;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use League\Glide\Signatures\SignatureException;
use League\Glide\Signatures\SignatureFactory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GlideController extends Controller
{
    public function show(Request $request, $path)
    {
        $config = config('hoavi-glide-laravel');

        $sign_key = $config['sign_key'];

        try {
            $path = $config['route'] . DIRECTORY_SEPARATOR . $path;
            // Validate HTTP signature
            SignatureFactory::create($sign_key)->validateRequest($path, $_GET);
        } catch (SignatureException $e) {
            throw new NotFoundHttpException('Image not found');
        }
        return app('glideServer')->getImageResponse($path, request()->all());
    }
}
