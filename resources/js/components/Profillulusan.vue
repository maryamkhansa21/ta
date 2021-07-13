<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Penetapan Profil Lulusan</h3>

                <div class="card-tools">
                     <button class="btn btn-success" @click="newModal">Tambah <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th>Profil Lulusan</th>
                      <th>Deskripsi</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr v-for="profillulusan in profillulusan" :key="profillulusan.id">
                      <td>{{profillulusan.profillulusan}}</td>
                      <td>{{profillulusan.deskripsi}}</td>
                      <td>
                          <a href="#" @click="editModal(profillulusan)">
                              <i class="fas fa-edit fa-fw"></i>
                          </a>
                          
                          <a href="#" @click="deleteProfillulusan(profillulusan.id)">
                              <i class="fas fa-trash fa-fw"></i>
                          </a>
                      </td>
                    </tr>
                    <tr>
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
                 <h5 class="modal-title" v-show="!editMode" id="addNewLabel">Tambah Profil Lulusan</h5>
                 <h5 class="modal-title" v-show="editMode" id="addNewLabel">Update Profil Lulusan</h5>
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? updateProfillulusan() : createProfillulusan()">
            <div class="modal-body">
               <div class="form-group">
                <input v-model="form.profillulusan" type="text" name="profillulusan"
                    placeholder="Profil Lulusan"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('profillulusan') }">
                <has-error :form="form" field="profillulusan"></has-error>
                </div>

                 <div class="form-group">
                <input v-model="form.deskripsi" type="text" name="deskripsi"
                    placeholder="Deskripsi"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('deskripsi') }">
                <has-error :form="form" field="deskripsi"></has-error>
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
                profillulusan : [],
                form:new Form({
                    profillulusan :'',
                    deskripsi:''
                })
            }
        },
        methods:{
           updateProfillulusan(){
                this.form.put(URL+'api/profillulusan/'+this.form.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                     
                         Fire.$emit('AfterCreate');
                
            },
            editModal(profillulusan){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(profillulusan);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
           deleteProfillulusan(id){
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
                                this.form.delete(URL+'api/profillulusan/'+id).then(()=>{
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
          loadProfillulusan(){
              axios.get(URL+'api/profillulusan').then(data => {
                  this.profillulusan = data.data;
              });
          },
          createProfillulusan(){
            this.form.post(URL+'api/profillulusan');
            $('#addNew').modal('hide')
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
          }
        },
        created() {
            this.loadProfillulusan();
        }
    }
</script>
