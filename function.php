<?php 


// student gander checked box selected here function
function checkRadio($value){
    if( isset($_POST['gander']) && is_array($_POST['gander']) && in_array($value, $_POST['gander'] )){
        echo "checked";
    }
}


function studentOptionBox($optionValues){
    foreach( $optionValues as $optionValue ){
        printf("<option value='%s'>%s</option>", strtolower($optionValue), ucwords($optionValue));
    }
}

// student image upload function here now
function studentImageUpload($file , $location = '', $file_format = ['png','jpg','jpeg'], $file_types = null){
    $file_name = $file['name'];
    $file_tmp_name = $file['tmp_name'];

    // file name extiantion system here now
    $file_array = explode('.',$file_name);
    $file_extiantion = strtolower(end($file_array));


    // file defauld type here now
    if( !isset( $file_types['type'])){
        $file_types['type'] = 'image';
    }

    if( !isset( $file_types['file_name'])){
        $file_types['file_name'] = '';
    }
    
    if( !isset( $file_names['fname'])){
        $file_types['fname']    = '';
    }

    if( !isset( $file_types['lname'])){
        $file_types['lname']    = '';
    }

    

    // file name types here now
    if($file_types['type'] == 'image' ){
        // file name ganaretion
        $file_name = md5( time(). rand() ) . '.' . $file_extiantion;
    }else{
        $file_name = date('d_m_Y_g_h_s'). '_' . $file_types['file_name'] . '_' . $file_types['fname'] .'_' . $file_types['lname'] . '.'  . $file_extiantion;
    }

    $messa = '';
    // students file formats system here now
    if( in_array( $file_extiantion, $file_format )  == false ){
        $messa = "<p class='alert alert-warning alert-dismissible fade show' role='alert'> Invalide Your File Format ! <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></p>";
    }else{
        move_uploaded_file($file_tmp_name, $location.$file_name);
    }

    return [
        'mess'  => $messa,
        'file_name' =>  $file_name,
    ];
    
}


