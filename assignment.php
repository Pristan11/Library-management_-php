<?php
     $dbconn = mysqli_connect("localhost", "jrepm_ajith", "ajith123", "jrepm_property_management")
    or die("Connecterd Failed ".mysqli_connect_error());
  //  include ('dbconn.php');
if (isset($_POST['property_deatils_submit']))
{
    $user_id = mysqli_real_escape_string($dbconn, $_POST['user_Id']);
    $headding = mysqli_real_escape_string($dbconn, $_POST['headding']);
    $property = mysqli_real_escape_string($dbconn, $_POST['property']);
    $location = mysqli_real_escape_string($dbconn, $_POST['location']);
    $amount = mysqli_real_escape_string($dbconn, $_POST['amount']);
    $type_of_amount = mysqli_real_escape_string($dbconn, $_POST['type_of_amount']);
    $type_of_property = mysqli_real_escape_string($dbconn, $_POST['type_of_property']);
    $no_of_bedrooms = mysqli_real_escape_string($dbconn, $_POST['no_of_bedrooms']); if(empty($no_of_bedrooms)){$no_of_bedrooms = 0;}
    $no_of_bathrooms = mysqli_real_escape_string($dbconn, $_POST['no_of_bathrooms']);if(empty($no_of_bathrooms)){$no_of_bathrooms = 0;}
    $no_of_floors = mysqli_real_escape_string($dbconn, $_POST['no_of_floors']);if(empty($no_of_floors)){$no_of_floors = 0;}
    $floor_area = mysqli_real_escape_string($dbconn, $_POST['floor_area']);
    $area_of_land = mysqli_real_escape_string($dbconn, $_POST['area_of_land']);
    $availability = mysqli_real_escape_string($dbconn, $_POST['availability']);
    $distance = mysqli_real_escape_string($dbconn, $_POST['distance']);
    $status = mysqli_real_escape_string($dbconn, $_POST['status']);

    $ac = mysqli_real_escape_string($dbconn, $_POST['ac']);
    $swimming_pool = mysqli_real_escape_string($dbconn, $_POST['swimming_pool']);

    $description = mysqli_real_escape_string($dbconn, $_POST['description']);
    
    $image1 = addslashes($_FILES['image1']['tmp_name']);
    $image2 = addslashes($_FILES['image2']['tmp_name']);
    $image3 = addslashes($_FILES['image3']['tmp_name']);
    $image4 = addslashes($_FILES['image4']['tmp_name']);
    $image5 = addslashes($_FILES['image5']['tmp_name']);
    
    if(!empty($image1) && !empty($image2) && !empty($image3) && !empty($image4) && !empty($image5)){
        $image1 = addslashes($_FILES['image1']['tmp_name']);
        $image1 = file_get_contents($image1);
        $image1 = base64_encode($image1);

        $image2 = addslashes($_FILES['image2']['tmp_name']);
        $image2 = file_get_contents($image2);
        $image2 = base64_encode($image2);

        $image3 = addslashes($_FILES['image3']['tmp_name']);
        $image3 = file_get_contents($image3);
        $image3 = base64_encode($image3);

        $image4 = addslashes($_FILES['image4']['tmp_name']);
        $image4 = file_get_contents($image4);
        $image4 = base64_encode($image4);

        $image5 = addslashes($_FILES['image5']['tmp_name']);
        $image5 = file_get_contents($image5);
        $image5 = base64_encode($image5);
    }
    
    $name = mysqli_real_escape_string($dbconn, $_POST['name']);
    $phone = mysqli_real_escape_string($dbconn, $_POST['tel']);
    $email = mysqli_real_escape_string($dbconn, $_POST['email']);

    date_default_timezone_set("Asia/Kolkata");
    $date = date('Y-m-d');
    $time = date('H:i:s');
    
    if(!empty($headding) && !empty($property) && !empty($location) && !empty($amount) && !empty($type_of_property) && $no_of_bedrooms >= 0 && $no_of_bathrooms >= 0 && $no_of_floors >= 0 && !empty($area_of_land) && !empty($availability) && !empty($distance) && !empty($image1) && !empty($image2) && !empty($image3) && !empty($image4) && !empty($image5))
    {
        $insert_property = "INSERT INTO property_detail 
         (ref_ID,
         	user_Id,
             headding,
             property,
             location,
             amount,
             type_of_amount,
             type_of_property,
             	no_of_bedrooms,
                 no_of_bathrooms,
                 	no_of_floors,
                     floor_area,
                     area_of_land,
                     availability,
                     distance,
                     	status,	
                         ac,
                         	swimming_pool,
                             	description,
                                 map,
                                 image1,
                                 	image2,	
                                     image3,
                                     	image4,
                                         	image5,
                                             	jrepmid,
                                                 name,
                                                 tel,
                                                 email,	
                                                 date,
                                                 time)
                                                  VALUES
         (NULL, 
         '2',
          '$headding',
          '$property',
            '$location',
             '$amount', 
             '$type_of_amount',
              '$type_of_property', 
              '$no_of_bedrooms',
               '$no_of_bathrooms',
                '$no_of_floors', 
                '$floor_area', 
                '$area_of_land', 
                '$availability', 
                '$distance', 
                '$status', 
                '$ac', 
                '$swimming_pool',
                 '$description', 
                 '$image1', 
                 '$image2', 
                 '$image3', 
                 '$image4',
                 '$image5',
                 '$name', 
                 '$phone',
                  '$email', 
                  '$date',
                   '$time')";
        $property_result = mysqli_query($dbconn, $insert_property);
        if($property_result)
        {
            header('LOCATION: Add_Property.php?success=0');
        }

        else
        {
            header("LOCATION: Add_Property.php?error=1");
        }
    }

    else
    {
        header("LOCATION: Add_Property.php?error=1");
    }
 }

 else
     {
         header("LOCATION: Add_Property.php?error=1");
     }

?>

INSERT INTO property_detail (user_Id,headding,property,location,amount,type_of_amount,type_of_property, no_of_bedrooms,no_of_bathrooms, no_of_floors,floor_area,area_of_land,availability,distance, status, ac, swimming_pool, description,image1, image2, image3, image4, image5,name,tel,email) VALUES ('2' , '$headding', '$property', '$location', '$amount', '$type_of_amount', '$type_of_property', '$no_of_bedrooms', '$no_of_bathrooms', '$no_of_floors', '$floor_area', '$area_of_land', '$availability', '$distance', '$status', '$ac', '$swimming_pool', '$description', '$image1', '$image2', '$image3', '$image4', '$image5','$name', '$phone', '$email')