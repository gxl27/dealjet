<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\Source\WebsiteSource;
use App\Services\Admin\Source\ProviderSource;
use App\Services\Admin\Source\PipeDriveSource;
use App\Services\Admin\Source\SalesforceSource;

class ClientController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        return Client::all();
    }

    public function sync(ProviderSource $providedSource)
    {
        $providedSource->syncronizeData(entityString: 'clients');
    }

    public function pipedrive(PipeDriveSource $pipeDriveSource)
    {
        $pipeDriveSource->syncronizeData(entityString: 'clients');
    }

    public function website(WebsiteSource $websiteSource)
    {
        $websiteSource->syncronizeData(entityString: 'clients');
    }

    public function salesforce(SalesforceSource $salesforceSource)
    {
        $salesforceSource->syncronizeData(entityString: 'clients');
    }
}
