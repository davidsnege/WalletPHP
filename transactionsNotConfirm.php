<?php
// https://blockchain.info/unconfirmed-transactions?format=json

function getTransactionsNotConfirm($address) {
    return file_get_contents('https://blockchain.info/unconfirmed-transactions?format=json'. $address);
}

$json = getTransactionsNotConfirm('1EzwoHtiXB4iFwedPr49iywjZn2nnekhoj');
$addr = '1EzwoHtiXB4iFwedPr49iywjZn2nnekhoj';

if(isset($addr)){

$arr = json_decode($json,false);
foreach ($arr as $key => $value) {
    foreach ($value as $key => $values) {

        if( !empty($values->out[0]->addr)  || 
            !empty($values->out[1]->addr)  || 
            !empty($values->inputs[0]->addr)  || 
            !empty($values->inputs[1]->addr)  || 
            !empty($values->inputs[0]->prev_out->addr)  || 
            !empty($values->inputs[1]->prev_out->addr) 
            )
            {
                echo '<pre>';
                echo "-------------------TICKET--------------------</br>";
                echo "---------------------------------------------</br>";
                        if(!empty($values->hash)){
                            echo "HASH: ";
                            print_r($values->hash); 
                        }        echo '</br>'; 
                echo "---------------------------------------------</br>";
                        if(!empty($values->out[0]->value)){
                            echo "OUT 0: ";
                            print_r($values->out[0]->value); 
                        }        echo '</br>'; 
                        if(!empty($values->out[0]->addr)){
                            echo "OUT 0 ADDR: ";
                            print_r($values->out[0]->addr); 
                        }        echo '</br>'; 
                        if(!empty($values->out[1]->value)){
                            echo "OUT 1: ";
                            print_r($values->out[1]->value); 
                        }        echo '</br>'; 
                        if(!empty($values->out[1]->addr)){
                            echo "OUT 1 ADDR: ";
                            print_r($values->out[1]->addr); 
                        }        echo '</br>'; 
                echo "---------------------------------------------</br>";
                        if(!empty($values->inputs[0]->prev_out->value)){
                            echo "PRE OUT 0: ";
                            print_r($values->inputs[0]->prev_out->value); 
                        }        echo '</br>'; 
                        if(!empty($values->inputs[0]->prev_out->addr)){
                            echo "PRE OUT 0 ADDR: ";
                            print_r($values->inputs[0]->prev_out->addr); 
                        }        echo '</br>'; 
                        if(!empty($values->inputs[1]->prev_out->value)){
                            echo "PRE OUT 1: ";
                            print_r($values->inputs[1]->prev_out->value); 
                        }        echo '</br>'; 
                        if(!empty($values->inputs[1]->prev_out->addr)){
                            echo "PRE OUT 1 ADDR: ";
                            print_r($values->inputs[1]->prev_out->addr); 
                        }        echo '</br>'; 
                echo "---------------------------------------------</br>";
            }
        }
    }
}
