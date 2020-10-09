<?php

namespace App\Http\Controllers\Site\Orgao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ata;
use App\Models\Ata_Orgao;
use Auth;
use DB;

class OrgaoController extends Controller
{
    public function index()
    {

        $atas = Ata_Orgao::Where('users_id', '=', auth()->user()->id)->paginate();

        return view('site.pages.orgao.index',  compact('atas'));
    }
}
