<template>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">CPL Program Studi</h3>
                <div class="card-tools">
                     <button class="btn btn-success" @click="newModal">Tambah <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Capaian Pembelajaran Lulusan</th>
                      <th>Unsur</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="c in cplprodi" :key="c.id">
                      <td>{{c.detailprofillulusan.code}}</td>
                      <td>{{c.detailprofillulusan.detail}}</td>
                      <td>{{c.unsur}}  
                        <td>
                          <a href="#" @click="editModal(c)">
                              <i class="fas fa-edit fa-fw"></i>
                          </a>
                          
                          <a href="#" @click="deleteCplprodi(c.id)">
                              <i class="fas fa-trash fa-fw"></i>
                          </a>
                      </td>    
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1"  role="dialog"
        aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" v-show="!editMode" id="addNewLabel">Tambah CPL Prodi</h5>
                 <h5 class="modal-title" v-show="editMode" id="addNewLabel">Update CPL Prodi</h5>
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? updateCplprodi() : createCplprodi()">
            <div class="modal-body">
               <div class="form-group">
                     <select name="code_id" v-model="form.code_id" id="code" class="form-control" :class="{ 'is-invalid': form.errors.has('code_id') }">
                        <option v-for="code in detailprofillulusan" :key="code.id" v-bind:value="code.id">{{ code.detail }}</option>
                    </select>
                <has-error :form="form" field="code"></has-error>
                </div>

            

                 <div class="form-group">
                     <select name="unsur" v-model="form.unsur" id="unsur" class="form-control" :class="{ 'is-invalid': form.errors.has('unsur') }">
                            <option value="sikap">Sikap</option>
                            <option value="pengetahuan">Pengetahuan</option>
                            <option value="keterampilan umum">Keterampilan Umum</option>
                            <option value="keterampilan Khusus">Keterampilan Khusus</option>
                        </select>
                        <has-error :form="form" field="unsur"></has-error>
                  </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button v-show="editMode" type="submit" class="btn btn-success">Update</button>
                <button v-show="!editMode" type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    const URL = "http://localhost:8000/";
    export default {
        data () {
            return {
                editMode: false,
                detailprofillulusan : [],
                cplprodi : [],
                  form:new Form({
                    code_id :'',
                    unsur :''
                })
            }
        },
       methods:{
         updateCplprodi(){
                this.form.put(URL+'api/cplprodi'+this.form.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                     
                         Fire.$emit('AfterCreate');
                
            },
            editModal(cplprodi){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(cplprodi);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
           deleteCplprodi(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        // Send request to the server
                         if (result.value) {
                                this.form.delete(URL+'api/cplprodi/'+id).then(()=>{
                                        Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                }).catch(()=> {
                                    swal("Failed!", "There was something wronge.", "warning");
                                });
                         }
                    })
            },
         loadCplprodi(){
              axios.get(URL+'api/cplprodi').then(data => {
                  this.cplprodi = data.data.data;
                  console.log(data);
              });
         },
          loadDetailprofillulusan(){
              axios.get(URL+'api/detailprofillulusan').then(data => {
                  this.detailprofillulusan = data.data.data;
              });
          },
          createCplprodi(){
            this.form.post(URL+'api/cplprodi');
            $('#addNew')
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
          }
        },
        created() {
            this.loadCplprodi();
            this.loadDetailprofillulusan();
        }
    }
</script>
