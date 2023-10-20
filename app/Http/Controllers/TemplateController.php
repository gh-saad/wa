<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;


class TemplateController extends Controller
{
    public function templates() {
        $data = Template::all();
        return view("templates.templates",["data" => $data]);
    }

    public function new() {
        return view("templates.create");
    }

    public function create(Request $request) {
        $request->validate([
            'template_name' => 'required',
            'template_body' => 'required',
        ]);
    
        // Create and save a new Contact instance
        $template = new Template();
        $template->name = $request->input('template_name');
        $template->body = $request->input('template_body');
        $template->status = 0;
        $template->save();

        return redirect()->route('backend-templates')->with('success', 'Template added successfully');
    }
}
