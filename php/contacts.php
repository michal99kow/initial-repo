
                <?php
                    include "db.php";
                    $data = array();
                    date_default_timezone_set("Europe/Warsaw");

                    $query = mysqli_query($con, "SELECT name, surname, availability FROM contacts");
                    while($row = mysqli_fetch_object($query)){
                        $availability = $row->availability;
                        $date = date('H:i');
                        $time = explode(" ",$availability);
                        if($time[0] < $date && $date < $time[2])
                        {
                            $availability_ = "1";
                        }
                        else
                        {
                            $availability_ = "0";
                        }
                        $row->availability = $availability_;

                        $data[] = $row;
                    }
                    echo json_encode($data);
                ?>