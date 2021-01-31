<?php

namespace App\Http\Controllers\API\V1;

use App\FAQ;
use App\Http\Controllers\Controller;
use App\Http\Resources\FAQResource;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index(FAQ $faq, Request $request){
        $perPage = $request->get('per_page', 15);
        return FAQResource::collection($faq->where('is_active', true)->paginate($perPage)
            ->appends([
                'per_page' => $perPage
            ])
        );
    }
}
