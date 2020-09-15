<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VariablesModel;

class VariableController extends Controller
{
    //
    public function showVariables() {
        $variableModel = new VariablesModel();
        $variables = $variableModel->get()->toArray();
        return view('admin.variables.index', compact('variables'));
    }

    public function addVariableForm() {
        return view('admin.variables.add-variable-form');
    }

    public function saveVariable(Request $request) {
        $variableModel = new VariablesModel();
        $existingVariable = $variableModel::where('name', $request->var_name)->get()->toArray();
        if(empty($existingVariable)) {
            $variableModel->name = $request->var_name;
            $variableModel->value = $request->var_value;
            $variableModel->save();
            return redirect('admin/variables')->with('status', 'You have successfully added a new variable');
        }
        else {
            return redirect('admin/variables')->with('error', 'You have already added this variable');
        }
    }

    public function editVariableForm(Request $request) {
        $id = $request->var_id;
        $variableModel = new VariablesModel();
        $variable = $variableModel::where('id', $id)->first()->toArray();
        return view('admin.variables.edit-variable-form', compact('variable'));
    }

    public function updateVariable(Request $request) {
        $id = $request->var_id;
        $variableModel = new VariablesModel();
        $variable = $variableModel::where('id', $id)->update(['name' => $request->var_name, 'value' => $request->var_value]);
        return redirect('admin/variables')->with('status', 'You have successfully updated an existing variable');
    }
}
