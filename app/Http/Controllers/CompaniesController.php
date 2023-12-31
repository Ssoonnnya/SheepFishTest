<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use Illuminate\Support\Facades\DB;
use \Mailjet\Resources;

class CompaniesController extends Controller
{
    public function index()
    {
            $companies = Companies::paginate(10);
            return view('companies.show', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'logo' => 'required|image:jpg, jpeg, png|dimensions:min_width=100,min_height=100',
            'website' => 'required|url',
        ]);

        $file = $request->file('logo');
        $name = '/logo/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $name);
        $fileData['logo'] = $name;


        $companyCreate = Companies::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'logo' => $name,
            'website' => $request->get('website'),
        ]);
        $companyArray = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'logo' => $name,
            'website' => $request->get('website'),
        ];

        $this->mailjetEmail($companyArray);

        return redirect('/companies');
    }

    public function mailjetEmail(array $companyArray)
    {
        $mailjet = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'),true,['version' => 'v3.1']);
        $email = [

            'FromEmail' => 'your@email.com',
            'FromName' => 'Your Name',
            'Subject' => 'New Company Created',
            'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href=\"https://www.mailjet.com/\">Mailjet</a>!</h3>
            <br />May the delivery force be with you!",
            'Recipients' => [
                [
                    'Email' => 'recipient@email.com',
                ],
            ],
        ];

        $response = $mailjet->post(Resources::$Email, ['body' => $email]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $companies = Companies::find($id);
        return view('companies.edit', ['companies' => $companies]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'logo' => 'required|image:jpg, jpeg, png|dimensions:min_width=100,min_height=100',
            'website' => 'required|url',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = 'logo/' . uniqid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $validated['logo'] = $name;
        }

        $company = Companies::findOrFail($id);

        $company->update($validated);

        return redirect()->route('companies.index', $company->id)->with('success', 'Company updated successfully');
    }

    public function destroy(string $id)
    {
        $company = Companies::find($id);

        if (!$company) {
            return redirect()->route('companies.index')->with('error', 'Company not found');
        }

        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');

    }
}
