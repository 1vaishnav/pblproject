
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repair/Maintenance Form</title>
    <link rel="stylesheet" href="formstyle.css">
</head>
<body>
    <div class="container">
        <div class="box-color">
            <form action="store_form_data.php" method="post">  
                <h2>Repair/Maintenance Requirement cum Action Form</h2>
                <br>
                <h3>1. Select The Name of Your Institute or Office</h3>
                <input type="radio" name="institute_office" value="Central_Office"> Central Office <br>
                <input type="radio" name="institute_office" value="Guest_House"> Guest House<br>
                <input type="radio" name="institute_office" value="KKWaghIEER"> KKWaghIEER, Nashik<br> 
                <input type="radio" name="institute_office" value="KKWPharmacy"> K K Wagh College of Pharmacy, Nashik<br> 
                <input type="radio" name="institute_office" value="GILRS_HOSTEL"> Girls Hostel and Mess, Nashik <br>
                <input type="radio" name="institute_office" value="Bhausaheb_Nagar_Campus"> Bhausaheb Nagar Campus<br>
                <input type="radio" name="institute_office" value="Kakasaheb_Nagar_Campus"> Kakasaheb Nagar Campus <br>
                <input type="radio" name="institute_office" value="Any_Other"> Any Other<br>
                <br>
                <h3>2. Write the Name of Your Department/Section/School</h3>
                <input type="text" name="department" class="inbox" placeholder="Details">      
                <br>
                <h3>3. Provide details of Contact Person of your Department/Section/School</h3>
                <h4>Full Name</h4>
                <input type="text" name="contact_name" class="inbox" placeholder="Name">
                <br>
                <h4>Email</h4>
                <input type="text" name="email" class="inbox" placeholder="Email">
                <h4>Mobile No</h4>
                <input type="text" name="mobile_no" class="inbox" placeholder="Mobile No">    
                <br>
                <h3>4. Select the type of Repair/Maintenance Requirement</h3>
                <br>
                <input type="radio" name="repair_type" value="Carpentry_Related_Work"> Carpentry Related Work<br> 
                <input type="radio" name="repair_type" value="Fabrication_or_Welding_related_work"> Fabrication or Welding related work<br>
                <input type="radio" name="repair_type" value="Both_Carpentry_&_Welding_related_work"> Both Carpentry & Welding related work<br> 
                <input type="radio" name="repair_type" value="Any_Other"> Any Other<br>   
                <br>
                <h3>5. Give the details about Repair/Maintenance Requirement Work</h3>
                <br>
                <input type="text" name="repair_details" class="inpt" placeholder="Details">
                <br>
                
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
