
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('coa')?></h6>
                </div>
                <div class="text-right">
                  
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
             
                  <div id="html">
                        <ul>
                         <?php
             use App\Modules\Account\Models\AccountModel;
             $this->accountModel  = new AccountModel();
                    $visit=array();
                    for ($i = 0; $i < count($userList); $i++)
                    {
                        $visit[$i] = false;
                    }

                    $this->accountModel->dfs("COA","0",$userList,$visit,0);
                    
                    ?>
                        </ul>
                    </div>

                    
                    </div>
                    </div>
                    </div>
                     <div class="modal fade" id="treeviewmodal" role="dialog">

<div class="modal-dialog">

<div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <div id="newform">
                        
       </div>
      </div>
     
    </div>
        
        </div>
        </div>

                    </div>
                      
