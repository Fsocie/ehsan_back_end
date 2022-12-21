<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    //
     //Liste des Agents
     public function index(){
        $agents = DB::SELECT("SELECT users.id,users.nom,users.prenoms,users.email,roles.name as role_name
            FROM users,model_has_roles,roles
            WHERE users.id = model_has_roles.model_id
            AND
            model_has_roles.role_id = roles.id 
            AND
            roles.name = 'Agent'");
        return view('backend.agents.index',compact('agents'));
    }
}
