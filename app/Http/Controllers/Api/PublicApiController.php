<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\DocumentResource;
use App\Http\Resources\Api\FiscalYearResource;
use App\Models\Document;
use App\Models\FiscalYear;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PublicApiController extends Controller
{
    public function document(Request $request): AnonymousResourceCollection
    {
        $activeFiscalYearId = FiscalYear::where('is_active', true)->pluck('id')->first();
        $documents = $activeFiscalYearId
            ? Document::where('fiscal_year_id', $activeFiscalYearId)->get()
            : Document::all();

        return DocumentResource::collection($documents);
    }



    public function documentShow(Document $document)
    {
        return DocumentResource::make($document);
    }

    public function fiscalYear():AnonymousResourceCollection
    {
        return FiscalYearResource::collection(FiscalYear::all());
    }
}
