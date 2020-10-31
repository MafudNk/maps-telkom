<?php

namespace App\Http\Controllers;

use App\odp;
use Illuminate\Http\Request;
use Excel;
use Validator;
use Session;
use Sum;

class OdpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $odp = odp::all();

        return view('Odp.index', compact('odp'));
    }


    /**

 * Import file into database Code

 *

 * @var array

 // */

public function importExcel(Request $request)

{

    $this->validate($request,[
        'import_excel' => 'required|mimes: xls,xlsx'
        ]);
// required|mimes: xls,xlsx
    $excel = $request->file('import_excel');

    // return $excel;

    $odp = Excel::selectSheets('DATAODP')->load($excel)->get();

    // return $odp_db[0]->pd_name;

     // return $odp()->pd_name;
    $rowRules =[
                'sto' => 'required',
                'pd_name' => 'required',
                'f_olt' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'is_avai' => 'required',
                'is_blocking' => 'required',
                'is_others' => 'required',
                'is_reserv' => 'required',
                'is_service' => 'required',
                'is_total' => 'required',
                'occ' => 'required',
                'occ_color' => 'required',
                'olt' => 'required',
                'modul' => 'required',
                'merk_olt' => 'required',
                'status' => 'required'
                
    ];
    
// return  $odp['PD_NAME'] ;
        $count = 0;
        $valid = 0;

        foreach ($odp as $row) {
            $validator=Validator::make($row->toArray(),$rowRules);
            if ($validator->fails()) continue;

            $odp_db = Odp::select('pd_name')->where('pd_name', trim($row['pd_name']))->get();

            if (count($odp_db) == 0) {
                $odp = new odp;
                $odp->sto   = $row['sto'];
                $odp->pd_name = $row['pd_name'];
                $odp->f_olt = $row['f_olt'];
                $odp->latitude = $row['latitude'];
                $odp->longitude = $row['longitude'];
                $odp->is_avai = $row['is_avai'];
                $odp->is_blocking = $row['is_blocking'];
                $odp->is_others = $row['is_others'];
                $odp->is_reserv = $row['is_reserv'];
                $odp->is_service = $row['is_service'];
                $odp->is_total = $row['is_total'];
                $odp->occ = $row['occ'];
                $odp->occ_color = $row['occ_color'];
                $odp->olt = $row['olt'];
                $odp->modul = $row['modul'];
                $odp->merk_olt = $row['merk_olt'];
                $odp->status = $row['status'];
                $odp->save();
                $count++;

            }else{
                $odp->sto   = $row['sto'];
                $odp->pd_name = $row['pd_name'];
                $odp->f_olt = $row['f_olt'];
                $odp->latitude = $row['latitude'];
                $odp->longitude = $row['longitude'];
                $odp->is_avai = $row['is_avai'];
                $odp->is_blocking = $row['is_blocking'];
                $odp->is_others = $row['is_others'];
                $odp->is_reserv = $row['is_reserv'];
                $odp->is_service = $row['is_service'];
                $odp->is_total = $row['is_total'];
                $odp->occ = $row['occ'];
                $odp->occ_color = $row['occ_color'];
                $odp->olt = $row['olt'];
                $odp->modul = $row['modul'];
                $odp->merk_olt = $row['merk_olt'];
                $odp->status = $row['status'];
                $odp->save();
                $count++;
            }

            // foreach ($odp_db as $item) {
            //     return $row['pd_name'].' = '.$item->pd_name;
            //     // if ($row['pd_name'] != $item->pd_name) {
            //     // }
            // }

            //return $valid;

            // foreach ($odp_db as $item) {
            //     if ($row['pd_name'] != $item->pd_name) {
            //        return $row['pd_name'].','.$item->pd_name;
            //     }
            // }

            // if ($valid == true) {
            //     $validator=Validator::make($row->toArray(),$rowRules);
            //     if ($validator->fails()) continue;

            //     $odp = new odp;
            //     $odp->sto   = $row['sto'];
            //     $odp->pd_name = $row['pd_name'];
            //     $odp->f_olt = $row['f_olt'];
            //     $odp->latitude = $row['latitude'];
            //     $odp->longitude = $row['longitude'];
            //     $odp->is_avai = $row['is_avai'];
            //     $odp->is_blocking = $row['is_blocking'];
            //     $odp->is_others = $row['is_others'];
            //     $odp->is_reserv = $row['is_reserv'];
            //     $odp->is_service = $row['is_service'];
            //     $odp->is_total = $row['is_total'];
            //     $odp->occ = $row['occ'];
            //     $odp->occ_color = $row['occ_color'];
            //     $odp->olt = $row['olt'];
            //     $odp->modul = $row['modul'];
            //     $odp->merk_olt = $row['merk_olt'];
            //     $odp->status = $row['status'];
            //     $odp->save();
            //     $count++;

            //     $valid = false;
            // }
            
        }
         // return $valid1.' = '.$valid2;


   Session::flash("flash_notification",[
        "level"=>"success",
        "message"=>"<strong>$count</strong> data(s) is imported"


 ]);
return redirect('odp');
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Odp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate(Request(), [
            'STO' => 'required',
            'PD_NAME' => 'required',
            'F_OLT' => 'required',
            'LATITUDE' => 'required',
            'LONGITUDE' => 'required',
            'IS_AVAI' => 'required',
            'IS_BLOCKING' => 'required',
            'IS_OTHERS' => 'required',
            'IS_RESERV' => 'required',
            'IS_SERVICE' => 'required',
            'IS_TOTAL' => 'required',
            'OLT' => 'required',
            'MODUL' => 'required',
            'MERK_OLT' => 'required',
            'STATUS' => 'required',
            ]);
        $odp = New Odp;
        $perhitungan = ($request->IS_BLOCKING + $request->IS_OTHERS + $request->IS_RESERV + $request->IS_SERVICE) / $request->IS_TOTAL;
         
        if ($perhitungan == 0 ) {
            ($warna = 'Hitam');
        }elseif ($perhitungan > 0.8) {
            ($warna = 'Merah');
        }elseif ($perhitungan <= 0.8) {
            ($warna = 'Kuning');
        }else ($perhitungan <= 0.4) {
            ($warna = 'Hijau')
        };
                     

        $odp->STO = $request->STO;
        $odp->PD_NAME = $request->PD_NAME;
        $odp->F_OLT = $request->F_OLT;
        $odp->LATITUDE = $request->LATITUDE;
        $odp->LONGITUDE = $request->LONGITUDE;
        $odp->IS_AVAI = $request->IS_AVAI;
        $odp->IS_BLOCKING = $request->IS_BLOCKING;
        $odp->IS_OTHERS = $request->IS_OTHERS;
        $odp->IS_RESERV = $request->IS_RESERV;
        $odp->IS_SERVICE = $request->IS_SERVICE;
        $odp->IS_TOTAL = $request->IS_TOTAL;
        $odp->OCC = $perhitungan;
        $odp->OCC_COLOR = $warna;
        $odp->OLT = $request->OLT;
        $odp->MODUL = $request->MODUL;
        $odp->MERK_OLT = $request->MERK_OLT;
        $odp->STATUS = $request->STATUS;

        if ($odp->save()) {
            Session::flash('flash_notification',[
                "level"     => "success",
                "message"   => 'data berhasil disimpan'
            ]);            
        }else{
            Session::flash('flash_notification',[
                "level"     => "danger",
                "message"   => 'data gagal disimpan'
            ]);
        }
        
        return redirect('odp');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\odp  $odp
     * @return \Illuminate\Http\Response
     */
    public function show(odp $odp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\odp  $odp
     * @return \Illuminate\Http\Response
     */
    public function edit(odp $odp)
    {
        
        return view('Odp.update',compact('odp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\odp  $odp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, odp $odp)
    {
         $perhitungan = $request->IS_BLOCKING + $request->IS_OTHERS + $request->IS_RESERV + $request->IS_SERVICE / $request->IS_TOTAL;
         
        if ($perhitungan == 0 ) {
            ($warna = 'Hitam');
        }elseif ($perhitungan > 0.8) {
            ($warna = 'Merah');
        }elseif ($perhitungan <= 0.8) {
            ($warna = 'Kuning');
        }else ($perhitungan <= 0.4) {
            ($warna = 'Hijau')
        };
        $odp->STO = $request->STO;
        $odp->PD_NAME = $request->PD_NAME;
        $odp->F_OLT = $request->F_OLT;
        $odp->LATITUDE = $request->LATITUDE;
        $odp->LONGITUDE = $request->LONGITUDE;
        $odp->IS_AVAI = $request->IS_AVAI;
        $odp->IS_BLOCKING = $request->IS_BLOCKING;
        $odp->IS_OTHERS = $request->IS_OTHERS;
        $odp->IS_RESERV = $request->IS_RESERV;
        $odp->IS_SERVICE = $request->IS_SERVICE;
        $odp->IS_TOTAL = $request->IS_TOTAL;
        $odp->OCC = $perhitungan;
        $odp->OCC_COLOR = $warna;
        $odp->OLT = $request->OLT;
        $odp->MODUL = $request->MODUL;
        $odp->MERK_OLT = $request->MERK_OLT;
        $odp->STATUS = $request->STATUS;

        if ($odp->save()) {
            Session::flash('flash_notification',[
                "level"     => "success",
                "message"   => 'Data berhasil diubah'
            ]);            
        }else{
            Session::flash('flash_notification',[
                "level"     => "danger",
                "message"   => 'Data gagal diubah'
            ]);
        }
        
        return redirect('odp');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\odp  $odp
     * @return \Illuminate\Http\Response
     */
    public function destroy(odp $odp)
    {
    
       
       if ($odp->delete()) {
            Session::flash('flash_notification',[
                "level"     => "success",
                "message"   => 'data berhasil dihapus'
            ]);            
        }else{
            Session::flash('flash_notification',[
                "level"     => "danger",
                "message"   => 'data gagal dihapus'
            ]);
        }
        
        return redirect('odp');
       }
}
