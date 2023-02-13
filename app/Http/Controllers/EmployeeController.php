<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeeExport;

class EmployeeController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Employee::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
            
        }else{
            $data = Employee::paginate(5);

        }

        return view('datapegawai',compact('data'));
    }
    public function tambahpegawai(){
        return view('tambahdata');
    }
    public function insertdata(Request $request){
        // dd($request->all());
       $data = Employee::create($request->all());
       if ($request->hasFile('foto')){
        $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
        $data->foto = $request->file('foto')->getClientOriginalName();
        $data->save();
       }
        return redirect()->route('pegawai')->with('success','Data Berhasil Ditambah');
    }
    public function tampilkandata($id){
        $data = Employee::find($id);
        // dd($data);
        return view('tampildata',compact('data'));
    } 
    public function updatekandata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success','Data Berhasil diupdate');
        // dd($data);
    }
    public function delete(Request $request, $id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success','Data Berhasil di Hapus');

    }
    public function exportpdf(){
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datapegawaipdf');
        return $pdf->download('data.pdf');
    }
    public function exportexcel(){
        return Excel::download(new EmployeeExport, 'datapegawai.xlsx');
    }
    public function grafik(Request $request){
        // $data = \DB::table('employees')
        // ->select([
        //     \DB::raw('count(*) as jumlah'),
        //     \DB::raw('DATE(created_at) as tanggal')
        // ])
        // ->groupBy('tanggal')
        // ->whereRAW('DATE(created_at) >=?',[date('Y-m-d',strtotime('-2days'))])
        // ->orderBy('tanggal','desc')
        // ->get()
        // ->toArray();
        // dd($data);

        
       return view('grafik');
        // return view('grafik',compact('userData'));
    }
}
