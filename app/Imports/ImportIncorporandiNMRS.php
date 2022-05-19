<?php

namespace App\Imports;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Row;
use App\Models\Allievo;
use Illuminate\Contracts\View\View;
use PHPUnit\Framework\Error;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
HeadingRowFormatter::default('none');
class ImportIncorporandiNMRS implements ToModel, WithHeadingRow
{
    private $allievi;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    * @throws \Illuminate\Validation\ValidationException
    */
    

    public function model(array $row)
    {      
        $row['NOME']=strtolower($row['NOME']);
        $row['NOME']=ucwords($row['NOME']);
        $row['COGNOME']=strtolower($row['COGNOME']);
        $row['COGNOME']=ucwords($row['COGNOME']);
        
        $allievo = new Allievo([
            'matricola_militare' => $row['MATRICOLA'],
            'nome' => $row['NOME'],
            'cognome' => $row['COGNOME'],
            'sesso' => $row['Sesso'],
            'codice_fiscale' => $row['Codfisc'],
            'data_nascita' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row['DATNASC'])),
            'luogo_nascita' => $row['LUOGO_NASC'],
            'provincia_nascita' => $row['PROV_NASC'],
            'nazione_nascita' => $row['NAZIONE'],
            'titolo_studio' => $row['STUDIO'],
            'corso' => Auth::user()->comando_appartenenza,
            'data_incorporamento' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row['DATATTOARR'])),
            'data_giuridica' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row['DATAGIUR'])),
            'data_arrivo' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row['DATAARRIVO'])),
            'status_attuale' => $row['MOTIVAZIONE'],
            'lavoro_precedente' => $row['LAVORO'],
            'provincia_residenza' => $row['PROV_RESI'],
            'luogo_residenza' => $row['LUOGO_RESI'],
            'cap_residenza' => $row['CAP'],
            'indirizzo_residenza' => $row['INDIRIZZO'],
            'scalo_ferroviario' => $row['SCALO_FERR'],
            'comando_carabinieri' => $row['COM_CARAB'],
            'tribunale' => $row['TRIBUNA'],
            'motivo_arruolamento' => $row['MOTI_ARRUO'],
            'sport_praticato' => $row['SPORT'],
            'livello_sport_praticato' => $row['LIVE_SPORT'],
            'livello_lingue' => $row['LIV_LINGUE'],
            'lingue' => $row['LINGUE'],
            'altro_titolo_studio' => $row['ALTROTITSTUDIO'],
            'studio_2' => $row['Studio2'],
            'scuola_militare' => $row['ScuolaMilitare'],
            'freq_accademia' => $row['Freq_accademia'],
            'provincia_domicilio' => $row['Prov_dom'],
            'luogo_domicilio' => $row['CittàDomicilio'],
            'cap_domicilio' => $row['Cap_dom'],
            'indirizzo_domicilio' => $row['IndirDomicilio'],
        ]);

        $allievo->save();

    }
	
}
