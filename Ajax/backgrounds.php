<?php
require_once( "../Models/BackgroundsModel.php" );
require_once( "../Models/Connection.php" );

    if(isset($_FILES['homefile']['name']) ) {
        
        $target_dir = "../Views/assets/GalleryImages/";
        
        $image         = basename( $_FILES["homefile"]["name"] );
        $imageFileType = pathinfo( $target_dir . $image, PATHINFO_EXTENSION );
        
        move_uploaded_file( $_FILES['homefile']['tmp_name'], $target_dir . $image );

        $results = BackgroundsModel::bghome($image);

        return $results;
}

    if(isset($_FILES['aboutfile']['name']) ) {
        
        $target_dir = "../Views/assets/GalleryImages/";
        
        $image         = basename( $_FILES["aboutfile"]["name"] );
        $imageFileType = pathinfo( $target_dir . $image, PATHINFO_EXTENSION );
        
        move_uploaded_file( $_FILES['aboutfile']['tmp_name'], $target_dir . $image );

        $results = BackgroundsModel::bgabout($image);

        return $results;
}

    if(isset($_FILES['galleryfile']['name']) ) {
        
        $target_dir = "../Views/assets/GalleryImages/";
        
        $image         = basename( $_FILES["galleryfile"]["name"] );
        $imageFileType = pathinfo( $target_dir . $image, PATHINFO_EXTENSION );
        
        move_uploaded_file( $_FILES['galleryfile']['tmp_name'], $target_dir . $image );

        $results = BackgroundsModel::bggallery($image);

        return $results;
}

    if(isset($_FILES['contactfile']['name']) ) {
        
        $target_dir = "../Views/assets/GalleryImages/";
        
        $image         = basename( $_FILES["contactfile"]["name"] );
        $imageFileType = pathinfo( $target_dir . $image, PATHINFO_EXTENSION );
        
        move_uploaded_file( $_FILES['contactfile']['tmp_name'], $target_dir . $image );

        $results = BackgroundsModel::bgcontact($image);

        return $results;
}
?>