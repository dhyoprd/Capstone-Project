 <!--row -->

                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-danger">
                            <div class="r-icon-stats">
                                <i class="fa fa-users bg-danger"></i>
                                <div class="bodystate">
                                    <h4 style="color:white"><?php echo $this->db->get('patient')->num_rows();?></h4>
                                    <span class="text-muted"><a href="" style="color:white"><?php echo get_phrase('New Patient');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-success">
                            <div class="r-icon-stats">
                                <i class="fa fa-credit-card bg-success"></i>
                                <div class="bodystate">
                                <h4 style="color:white"><?php echo $this->db->get('invoice')->num_rows();?></h4>
                                    <span class="text-muted"><a href="" style="color:white"><?php echo get_phrase('New Invoice');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-info">
                            <div class="r-icon-stats">
                                <i class="fa fa-edit bg-info"></i>
                                <div class="bodystate">
                                <h4 style="color:white"><?php echo $this->db->get('shedule')->num_rows();?></h4>
                                    <span class="text-muted"><a href="" style="color:white"><?php echo get_phrase('New Shedule');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-purple">
                            <div class="r-icon-stats">
                                <i class="fa fa-link bg-purple"></i>
                                <div class="bodystate">
                                <h4 style="color:white"><?php echo $this->db->get('appointment')->num_rows();?></h4>
                                    <span class="text-muted"><a href="" style="color:white"><?php echo get_phrase('Appointment');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>
              
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><?php echo get_phrase('New Patient List');?></h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><?php echo get_phrase('Name');?></th>
                                            <th><?php echo get_phrase('Gender');?></th>
                                            <th><?php echo get_phrase('Email');?></th>
                                            <th><?php echo get_phrase('Number');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                <?php 
                   
                    $sql = "SELECT * FROM patient order by patient_id desc LIMIT 5";
                    $array_select = $this->db->query($sql)->result_array();
                    foreach ($array_select as $key => $patient):?>
                                        <tr>
                                            <td><?php echo $patient['name'];?></td>
                                            <td><?php echo $patient['sex'];?></td>
                                            <td><?php echo $patient['email'];?></td>
                                            <td><?php echo $patient['phone'];?></td>
                                        </tr>
                      <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->