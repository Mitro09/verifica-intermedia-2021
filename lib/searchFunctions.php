<?php

function searchTextName($searchText) {

    return function ($utenti) use ($searchText){
        $noSpaces = preg_replace('/[ ]+/m',' ',$searchText);
        $lowerSearch = trim(strtolower($noSpaces));
        if ($lowerSearch !== ''){
            $result = stripos($utenti['firstName'], $lowerSearch) !== false;
        }
        else{
            $result = true;
        }
        return $result;
    };
}

function searchTextLastName($searchText) {

    return function ($utenti) use ($searchText){
        $noSpaces = preg_replace('/[ ]+/m',' ',$searchText);
        $lowerSearch = trim(strtolower($noSpaces));
        if ($lowerSearch !== ''){
            $result = stripos($utenti['lastName'], $lowerSearch) !== false;
        }
        else{
            $result = true;
        }
        return $result;
    };
}



function searchTextEmail($searchText) {

    return function ($utenti) use ($searchText){
        $noSpaces = preg_replace('/[ ]+/m',' ',$searchText);
        $lowerSearch = trim(strtolower($noSpaces));
        if ($lowerSearch !== ''){
            $result = stripos($utenti['email'], $lowerSearch) !== false;
        }
        else{
            $result = true;
        }
        return $result;
    };
}

function searchTextID($searchText) {

    return function ($utenti) use ($searchText){
        if ($searchText !== ''){
           return stripos($utenti['id'],$searchText) !== false;
        }
    };
}
       
