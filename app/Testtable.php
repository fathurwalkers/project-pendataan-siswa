<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testtable extends Model
{
    protected $table = 'test_table';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

    // ['nama'=>['ABDUL RAHMAT','Ahmad Fauzan','AL IKHSAN ABDUL RAHMAN','ARFIANSYAH','Aril','Aswad','Avdal','Citra','Dafrin','Darwin','Dasman','Delfi','Devin','DIAN INDRIANI','Edwin','Fadli','Faril','Farlan','Fikran','Ikmal Saputra','Indriyani','Istiani','Jamal','JUMARDI YANSA','Kasman','Kasmin','LaArga','LaIrman','LaRomi','Leni Elvian','Marlisa','Mawar','Muh. Akbar','Muhamad Fajar','Nesti','Nova Marisa','Nurhalima','Nurmila','Rahmat','Ranti','Rasti','RENDI ARIFIN','Restiyanti','Revi Mariska','Ridwan','Rinda','Rislan','Sadiman','SALIM SUKMA','Sandra','Selni Sutriani','Selvi','SIGITALFARAD','Sista','SITI SHALEHA','Sry Alfianti','Wa Misna','Wulan Mutmainna','Yasrin','YUSLIATI','Yuswita','ZIKRAN'],'nisn'=>['0077768933','0078342758','0076956762','0083625737','0067293268','0056491016','0078299941','0066864939','0053722584','0068308637','0063017881','0053045883','0073331986','0082499829','0051401380','0067362507','0057710680','0059535843','0042653948','0042653947','0069285792','0056693575','0041389350','0089313618','0052013228','0048979722','0079831046','0048059550','0041329529','0069672143','0065793022','0061053156','0079704173','0073204003','0077642701','0066891200','0069026698','0059763603','0043284200','0047297816','0064746988','0079393297','0053472417','0069108488','0036473682','0049314287','0052994661','0054268385','0058077820','0054570781','0053339061','0068774183','0042755136','0066501674','0071739569','0071555196','9993549568','0063845691','0056565522','0076333615','0064937134','0073735029'],'jenis_kelamin'=>['L','L','L','L','L','L','L','P','L','L','L','L','L','P','L','L','L','L','L','L','P','P','L','L','L','P','L','L','L','P','P','P','L','L','P','P','P','P','L','P','P','L','P','P','L','P','L','L','L','P','P','P','L','P','P','P','P','P','L','P','P','L']];
}
