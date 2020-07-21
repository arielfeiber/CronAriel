<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'server_id','minuto', 'hora', 'dia_mes', 'mes', 'dia_semana', 'comando',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function tempoRestante()
    {
        $id = $_GET['id'];
        $job = Job::all()->where('server_id', $id);

        $minuto = $this->minuto;
        $hora = $this->hora;
        $dia_mes = $this->dia_mes;
        $mes = $this->mes;
        $dia_semana = $this->dia_semana;

        if ($dia_semana == '*') {
            $dia_mes = '*';
        }

        // DIA DA SEMANA
        $pos1 = strpos($dia_semana, '*');
        $pos2 = strpos($dia_semana, ',');
        $pos3 = strpos($dia_semana, '-');
        $pos4 = strpos($dia_semana, '/');

        if (true == $pos1) {
            $operador = '*';
        } elseif (true == $pos2) {
            $operador = ',';
        } elseif (true == $pos3) {
            $operador = '-';
        } elseif (true == $pos4) {
            $operador = '/';
        } else {
            $dia_semana_atual = Carbon::now('America/Sao_Paulo')->format('D');



            if ($dia_semana_atual == 'Sun'){
                $dia_semana_atual = 1;
            } elseif ($dia_semana_atual == 'Mon') {
                $dia_semana_atual = 2;
            } elseif ($dia_semana_atual == 'Tue') {
                $dia_semana_atual = 3;
            } elseif ($dia_semana_atual == 'Wed') {
                $dia_semana_atual = 4;
            } elseif ($dia_semana_atual == 'Thu') {
                $dia_semana_atual = 5;
            } elseif ($dia_semana_atual == 'Fri') {
                $dia_semana_atual = 6;
            }


            if ($dia_semana !== '*') {
                if ($dia_semana < $dia_semana_atual) {
                    $dia_semana = 7 - ($dia_semana_atual - $dia_semana);
                    $operador = $dia_semana;
                } elseif ($dia_semana_atual == $dia_semana) {
                    $dia_semana = '0';
                    $operador = $dia_semana;
                } else {
                    $dia_semana = $dia_semana - $dia_semana_atual;
                    $operador = $dia_semana;
                }
            } else {
                $operador = '*';
            }
        }

        switch ($operador) {
            case '*':
                $dia_semana = 0;
                break;
            case '-':
                $valores = explode('-', trim($dia_semana));
                $dia_semana_atual = Carbon::now('America/Sao_Paulo')->format('D');
                if ($dia_semana_atual == 'Sun'){
                    $dia_semana_atual = 1;
                } elseif ($dia_semana_atual == 'Mon') {
                    $dia_semana_atual = 2;
                } elseif ($dia_semana_atual == 'Tue') {
                    $dia_semana_atual = 3;
                } elseif ($dia_semana_atual == 'Wed') {
                    $dia_semana_atual = 4;
                } elseif ($dia_semana_atual == 'Thu') {
                    $dia_semana_atual = 5;
                } elseif ($dia_semana_atual == 'Fri') {
                    $dia_semana_atual = 6;
                }
                $elementos = ($valores[1] - $valores[0]) + 1;
                $num = array();
                $num[0] = $valores[0];
                for ($i = 1; $i < $elementos; $i++) {
                    $num[$i] = $num[$i - 1] + 1;
                }
                $dia_semana = array();
                $i = 0;

                foreach ($num as $valor) {
                    if ($dia_semana_atual > $valor) {
                        $dia_semana[$i] = 7 - $dia_semana_atual + $valor;
                    } else {
                        $dia_semana[$i] = $valor - $dia_semana_atual;
                    }
                    $i++;
                }
                $dia_semana = min($dia_semana);
                break;
            case '/':
                $valores = explode('/', trim($dia_semana));
                $dia_semana_atual = Carbon::now('America/Sao_Paulo')->format('D');
                if ($dia_semana_atual == 'Sun'){
                    $dia_semana_atual = 1;
                } elseif ($dia_semana_atual == 'Mon') {
                    $dia_semana_atual = 2;
                } elseif ($dia_semana_atual == 'Tue') {
                    $dia_semana_atual = 3;
                } elseif ($dia_semana_atual == 'Wed') {
                    $dia_semana_atual = 4;
                } elseif ($dia_semana_atual == 'Thu') {
                    $dia_semana_atual = 5;
                } elseif ($dia_semana_atual == 'Fri') {
                    $dia_semana_atual = 6;
                }
                $num = array();
                $intervalo = $valores[1];
                $div = 7 / $intervalo;
                $num[0] = 0;
                for ($i = 1; $i < $div; $i++) {
                    $num[$i] = $num[$i - 1] + $intervalo;
                }
                $i = 0;
                $dia_semana = array();

                foreach ($num as $valor) {
                    if ($dia_semana_atual > $valor) {
                        $dia_semana[$i] = 7 - $dia_semana_atual + $valor;
                    } else {
                        if ($dia_semana_atual != $valor) {
                            $dia_semana[$i] = $valor - $dia_semana_atual;
                        }
                    }
                    $i++;
                }
                $dia_semana = min($dia_semana);
                break;

            case ',':
                $valores = explode(',', trim($dia_semana));
                $dia_semana_atual = Carbon::now('America/Sao_Paulo')->format('D');
                if ($dia_semana_atual == 'Sun'){
                    $dia_semana_atual = 1;
                } elseif ($dia_semana_atual == 'Mon') {
                    $dia_semana_atual = 2;
                } elseif ($dia_semana_atual == 'Tue') {
                    $dia_semana_atual = 3;
                } elseif ($dia_semana_atual == 'Wed') {
                    $dia_semana_atual = 4;
                } elseif ($dia_semana_atual == 'Thu') {
                    $dia_semana_atual = 5;
                } elseif ($dia_semana_atual == 'Fri') {
                    $dia_semana_atual = 6;
                }
                $i = 0;
                $dia_semana = array();
                foreach ($valores as $valor) {
                    if ($dia_semana_atual > $valor) {
                        $dia_semana[$i] = 7 - $dia_semana_atual + $valor;
                    } else {
                        $dia_semana[$i] = $valor - $dia_semana_atual;
                    }
                    $i++;
                }
                $dia_semana = min($dia_semana);
                break;
        }

// MÊS DO ANO
        $pos1 = strpos($mes, '*');
        $pos2 = strpos($mes, ',');
        $pos3 = strpos($mes, '-');
        $pos4 = strpos($mes, '/');

        if (true == $pos1) {
            $operador = '*';
        } elseif (true == $pos2) {
            $operador = ',';
        } elseif (true == $pos3) {
            $operador = '-';
        } elseif (true == $pos4) {
            $operador = '/';
        } else {
            $mes_atual = Carbon::now('America/Sao_Paulo')->format('m');
            if ($mes !== '*') {
                if ($mes < $mes_atual) {
                    $mes = 12 - ($mes_atual - $mes);
                    $operador = $mes;
                } elseif ($mes_atual == $mes) {
                    $mes = '0';
                    $operador = $mes;
                } else {
                    $mes = $mes - $mes_atual;
                    $operador = $mes;
                }
            } else {
                $operador = '*';
            }
        }

        switch ($operador) {
            case '*':
                $mes = 0;
                break;
            case '-':
                $valores = explode('-', trim($mes));
                $mes_atual = Carbon::now('America/Sao_Paulo')->format('m');
                $elementos = ($valores[1] - $valores[0]) + 1;
                $num = array();
                $num[0] = $valores[0];
                for ($i = 1; $i < $elementos; $i++) {
                    $num[$i] = $num[$i - 1] + 1;
                }
                $mes = array();
                $i = 0;

                foreach ($num as $valor) {
                    if ($mes_atual > $valor) {
                        $mes[$i] = 12 - $mes_atual + $valor;
                    } else {
                        $mes[$i] = $valor - $mes_atual;
                    }
                    $i++;
                }
                $mes = min($mes);
                break;
            case '/':
                $valores = explode('/', trim($mes));
                $mes_atual = Carbon::now('America/Sao_Paulo')->format('m');
                $num = array();
                $intervalo = $valores[1];
                $div = 12 / $intervalo;
                $num[0] = 0;
                for ($i = 1; $i < $div; $i++) {
                    $num[$i] = $num[$i - 1] + $intervalo;
                }
                $i = 0;
                $mes = array();

                foreach ($num as $valor) {
                    if ($mes_atual > $valor) {
                        $mes[$i] = 12 - $mes_atual + $valor;
                    } else {
                        if ($mes_atual != $valor) {
                            $mes[$i] = $valor - $mes_atual;
                        }
                    }
                    $i++;
                }
                $mes = min($mes);
                break;

            case ',':
                $valores = explode(',', trim($mes));
                $mes_atual = Carbon::now('America/Sao_Paulo')->format('m');
                $i = 0;
                $mes = array();
                foreach ($valores as $valor) {
                    if ($mes_atual > $valor) {
                        $mes[$i] = 12 - $mes_atual + $valor;
                    } else {
                        $mes[$i] = $valor - $mes_atual;
                    }
                    $i++;
                }
                $mes = min($mes);
                break;
        }

        // DIA DO MES

        $pos1 = strpos($dia_mes, '*');
        $pos2 = strpos($dia_mes, ',');
        $pos3 = strpos($dia_mes, '-');
        $pos4 = strpos($dia_mes, '/');

        if (true == $pos1) {
            $operador = '*';
        } elseif (true == $pos2) {
            $operador = ',';
        } elseif (true == $pos3) {
            $operador = '-';
        } elseif (true == $pos4) {
            $operador = '/';
        } else {
            $dia_mes_atual = Carbon::now('America/Sao_Paulo')->format('d');
            if ($dia_mes !== '*') {
                if ($dia_mes < $dia_mes_atual) {
                    $dia_mes = 30 - ($dia_mes_atual - $dia_mes);
                    $operador = $dia_mes;
                } elseif ($dia_mes_atual == $dia_mes) {
                    $dia_mes = '0';
                    $operador = $dia_mes;
                } else {
                    $dia_mes = $dia_mes - $dia_mes_atual;
                    $operador = $dia_mes;
                }
            } else {
                $operador = '*';
            }
        }

        switch ($operador) {
            case '*':
                $dia_mes = 0;
                break;
            case '-':
                $valores = explode('-', trim($dia_mes));
                $dia_mes_atual = Carbon::now('America/Sao_Paulo')->format('d');
                $elementos = ($valores[1] - $valores[0]) + 1;
                $num = array();
                $num[0] = $valores[0];

                for ($i = 1; $i < $elementos; $i++) {
                    $num[$i] = $num[$i - 1] + 1;
                }
                $dia_mes = array();
                $i = 0;

                foreach ($num as $valor) {
                    if ($dia_mes_atual > $valor) {
                        $dia_mes[$i] = 30 - $dia_mes_atual + $valor;
                    } else {
                        $dia_mes[$i] = $valor - $dia_mes_atual;
                    }
                    $i++;
                }
                $dia_mes = min($dia_mes);
                break;
            case '/':
                $valores = explode('/', trim($dia_mes));
                $dia_mes_atual = Carbon::now('America/Sao_Paulo')->format('d');
                $num = array();
                $intervalo = $valores[1];
                $div = 30 / $intervalo;
                $num[0] = 0;

                for ($i = 1; $i < $div; $i++) {
                    $num[$i] = $num[$i - 1] + $intervalo;
                }
                $i = 0;
                $dia_mes = array();

                foreach ($num as $valor) {
                    if ($dia_mes_atual > $valor) {
                        $dia_mes[$i] = 30 - $dia_mes_atual + $valor;
                    } else {
                        if ($dia_mes_atual != $valor) {
                            $dia_mes[$i] = $valor - $dia_mes_atual;
                        }
                    }
                    $i++;
                }
                $dia_mes = min($dia_mes);
                break;

            case ',':
                $valores = explode(',', trim($dia_mes));
                $dia_mes_atual = Carbon::now('America/Sao_Paulo')->format('d');
                $i = 0;
                $dia_mes = array();
                foreach ($valores as $valor) {
                    if ($dia_mes_atual > $valor) {
                        $dia_mes[$i] = 30 - $dia_mes_atual + $valor;
                    } else {
                        $dia_mes[$i] = $valor - $dia_mes_atual;
                    }
                    $i++;
                }
                $dia_mes = min($dia_mes);
                break;
        }

        // HORA

        $pos1 = strpos($hora, '*');
        $pos2 = strpos($hora, ',');
        $pos3 = strpos($hora, '-');
        $pos4 = strpos($hora, '/');

        if (true == $pos1) {    // $pos1 !== false
            $operador = '*';
        } elseif (true == $pos2) {
            $operador = ',';
        } elseif (true == $pos3) {
            $operador = '-';
        } elseif (true == $pos4) {
            $operador = '/';
        } else {
            $hora_atual = Carbon::now('America/Sao_Paulo')->format('H');
            if ($hora !== '*') {
                if ($hora < $hora_atual) {
                    $hora = 24 - ($hora_atual - $hora);
                    $operador = $hora;
                } elseif ($hora_atual == $hora) {
                    $hora = '0';
                    $operador = $hora;
                } else {
                    $hora = $hora - $hora_atual;
                    $operador = $hora;
                }
            } else {
                $operador = '*';
            }
        }

        switch ($operador) {
            case '*':
                $hora = 0;
                break;
            case '-':
                $valores = explode('-', trim($hora));
                $hora_atual = Carbon::now('America/Sao_Paulo')->format('H');
                $elementos = ($valores[1] - $valores[0]) + 1;
                $num = array();
                $num[0] = $valores[0];

                for ($i = 1; $i < $elementos; $i++) {
                    $num[$i] = $num[$i - 1] + 1;
                }
                $hora = array();
                $i = 0;

                foreach ($num as $valor) {
                    if ($hora_atual > $valor) {
                        $hora[$i] = 24 - $hora_atual + $valor;
                    } else {
                        $hora[$i] = $valor - $hora_atual;
                    }
                    $i++;
                }

                $hora = min($hora);
                break;
            case '/':
                $valores = explode('/', trim($hora));
                $hora_atual = Carbon::now('America/Sao_Paulo')->format('H');
                $num = array();
                $intervalo = $valores[1];
                $div = 24 / $intervalo;
                $num[0] = 0;

                for ($i = 1; $i < $div; $i++) {
                    $num[$i] = $num[$i - 1] + $intervalo;
                }
                $i = 0;
                $hora = array();

                foreach ($num as $valor) {
                    if ($hora_atual > $valor) {
                        $hora[$i] = 24 - $hora_atual + $valor;
                    } else {
                        if ($hora_atual != $valor) {
                            $hora[$i] = $valor - $hora_atual;
                        }
                    }
                    $i++;
                }
                $hora = min($hora);
                break;

            case ',':
                $valores = explode(',', trim($hora));
                $hora_atual = Carbon::now('America/Sao_Paulo')->format('H');
                $i = 0;
                $hora = array();
                foreach ($valores as $valor) {
                    if ($hora_atual > $valor) {
                        $hora[$i] = 24 - $hora_atual + $valor;
                    } else {
                        $hora[$i] = $valor - $hora_atual;
                    }
                    $i++;
                }
                $hora = min($hora);
                break;
        }

        // MINUTO

        $pos1 = strpos($minuto, '*');
        $pos2 = strpos($minuto, ',');
        $pos3 = strpos($minuto, '-');
        $pos4 = strpos($minuto, '/');

        if (true == $pos1) {    // $pos1 !== false
            $operador = '*';

        } elseif (true == $pos2) {
            $operador = ',';
        } elseif (true == $pos3) {
            $operador = '-';
        } elseif (true == $pos4) {
            $operador = '/';
        } else {
            $minuto_atual = Carbon::now('America/Sao_Paulo')->format('i');
            if ($minuto !== '*') {
                if ($minuto < $minuto_atual) {
                    $minuto = 60 - ($minuto_atual - $minuto);
                    $operador = $minuto;
                } elseif ($minuto_atual == $minuto) {
                    $minuto = '0';
                    $operador = $minuto;
                } else {
                    $minuto = $minuto - $minuto_atual;
                    $operador = $minuto;
                }
            } else {
                $operador = '*';
            }
        }

        switch ($operador) {
            case '*':
                $minuto = 1;
                break;
            case '-':
                $valores = explode('-', trim($minuto));
                $minuto_atual = Carbon::now('America/Sao_Paulo')->format('i');
                $elementos = ($valores[1] - $valores[0]) + 1;
                $num = array();
                $num[0] = $valores[0];

                for ($i = 1; $i < $elementos; $i++) {
                    $num[$i] = $num[$i - 1] + 1;
                }
                $minuto = array();
                $i = 0;

                foreach ($num as $valor) {
                    if ($minuto_atual > $valor) {
                        $minuto[$i] = 60 - $minuto_atual + $valor;
                    } else {
                        $minuto[$i] = $valor - $minuto_atual;
                    }
                    $i++;
                }
                $minuto = min($minuto);
                break;
            case '/':
                $valores = explode('/', trim($minuto));
                $minuto_atual = Carbon::now('America/Sao_Paulo')->format('i');
                $num = array();
                $intervalo = $valores[1];
                $div = 60 / $intervalo;
                $num[0] = 0;

                for ($i = 1; $i < $div; $i++) {
                    $num[$i] = $num[$i - 1] + $intervalo;
                }
                $i = 0;
                $minuto = array();

                foreach ($num as $valor) {
                    if ($minuto_atual > $valor) {
                        $minuto[$i] = 60 - $minuto_atual + $valor;
                    } else {
                        if ($minuto_atual != $valor) {
                            $minuto[$i] = $valor - $minuto_atual;
                        }
                    }
                    $i++;
                }
                $minuto = min($minuto);
                break;

            case ',':
                $valores = explode(',', trim($minuto));
                $minuto_atual = Carbon::now('America/Sao_Paulo')->format('i');
                $i = 0;
                $minuto = array();
                foreach ($valores as $valor) {
                    if ($minuto_atual > $valor) {
                        $minuto[$i] = 60 - $minuto_atual + $valor;
                    } else {
                        $minuto[$i] = $valor - $minuto_atual;
                    }
                    $i++;
                }
                $minuto = min($minuto);
                break;
        }

        if ($dia_mes > $dia_semana) {
            $dia_mes = $dia_semana;
        } else {
            $final = $dia_mes;
            $dia_mes = $final;
        }

        $frase = 'Faltam '.$mes.' mês(es), '.$dia_mes.' dia(a), '.$hora.' hora(s) e '.$minuto.' minuto(s)';
        return $frase;




    }

}
