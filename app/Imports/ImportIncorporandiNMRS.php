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
use App\Models\PosizioneMilitare;
use App\Models\ProfiloSanitario;
use App\Models\RecapitoAllievo;
use App\Models\Familiare;
use App\Models\Documento;
HeadingRowFormatter::default ('none');
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
        $row['NOME'] = strtolower($row['NOME']);
        $row['NOME'] = ucwords($row['NOME']);
        $row['COGNOME'] = strtolower($row['COGNOME']);
        $row['COGNOME'] = ucwords($row['COGNOME']);

        $allievi = new Allievo([
            'matricola_militare' => $row['MATRICOLA'],
            'nome' => $row['NOME'],
            'cognome' => $row['COGNOME'],
            'sesso' => strtolower($row['Sesso']),
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

        $row['GRADO_FF'] = strtolower($row['GRADO_FF']);

        switch ($row['GRADO_FF']) {
            case 'vfp1':
                $categoria= $row['CatVFP1'];
                $spe = false;
                $ex_militare = true;
                break;
            case 'vfp4':
                $categoria = $row['CatVFP4'];
                $spe = false;
                $ex_militare = true;
                break;
            case 'auf':
                $categoria = $row['RuoloAUFP'];
                $spe = false;
                $ex_militare = true;
                break;
            case 'sgt':
                $categoria = $row['CatSGT'];
                $spe = true;
                $ex_militare = true;
                break;
        }

        if (strtolower($row['PENDENZE_G'] == 'si')){
            $pendenze=true;
        } else {
            $pendenze=false;
        }

        $posizioni_militari = new PosizioneMilitare([
            'compamare_ascrizione' => $row['COMPAMARE'],
            'stato_civile' => $row['StatoCivile'],
            'num_figli' => $row['N_figli'],
            'forza_armata' => $row['DECODIFF'],
            'comando_provenienza' => $row['DEST_FF'],
            'grado' => $row['GRADO_FF'],
            'in_servizio' => $row['IN_SERVIZI'],
            'in_congedo' => $row['IN_CONGEDO'],
            'num_fratelli' => $row['FRATELLI'],
            'pendenze_giudiziarie' => $pendenze,
            'categoria' => $categoria,
            'spe' => $spe,
            'ex_militare' => $ex_militare,
            'matricola_allievo' => $row['MATRICOLA'],
            'giuramento' => $row['Giuramento'],

        ]);

        $profili_sanitari= new ProfiloSanitario([
            'gruppo_sanguigno' => $row['SANGUE'],
            'fattore_rh' => $row['FATTORE_RH'],
            'asl_appartenenza' => $row['ASL'],
            'matricola_allievo' => $row['MATRICOLA'],
        ]);

        $recapiti_allievi=new RecapitoAllievo([
            'num_cellulare' => $row['TELEFONO'],
            'matricola_allievo' => $row['MATRICOLA'],
        ]);

        $dati_familiari=new Familiare([
            'cognome' => $row['COGN_ALTER'],
            'nome' => $row['NOM_ALTER'],
            'citta_residenza' => $row['RESI_ALTER'],
            'provincia_residenza' => $row['PROV_ALTER'],
            'cap_residenza' => $row['CAP_ALTER'],
            'indirizzo_residenza' => $row['IND_ALTER'],
            'recapito_telefonico' => $row['TELE_ALTER'],
            'matricola_allievo' => $row['MATRICOLA'],

        ]);

        $documenti=new Documento([
            'tipo_documento' => $row['Tipo'],
            'num_documento' => $row['Docume'],
            'rilasciato_da' => $row['Rilascio'],
            'data_rilascio' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject((int)$row['DataRil'])),
            'matricola_allievo' => $row['MATRICOLA'],
        ]);


        $allievi->save();
        $profili_sanitari->save();
        $posizioni_militari->save();
        $documenti->save();
        $recapiti_allievi->save();
        $dati_familiari->save();

    }


}
