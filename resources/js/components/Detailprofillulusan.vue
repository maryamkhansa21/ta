<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Profil Lulusan</h3>

                <div class="card-tools">
                     <button class="btn btn-success" @click="newModal">Tambah <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th>Code</th>
                      <th>Detail</th>
                      <th>Profil Lulusan</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr v-for="detailprofillulusan in detailprofillulusan" :key="detailprofillulusan.id">
                      <td>{{detailprofillulusan.code}}</td>
                      <td>{{detailprofillulusan.detail}}</td>
                      <td>{{detailprofillulusan.profillulusan.profillulusan}}</td>
                      <td>
                          <a href="#" @click="editModal(detailprofillulusan)">
                              <i class="fas fa-edit fa-fw"></i>
                          </a>
                          
                          <a href="#" @click="deleteDetailprofillulusan(detailprofillulusan.id)">
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
                 <h5 class="modal-title" v-show="!editMode" id="addNewLabel">Tambah Detail Profil Lulusan</h5>
                 <h5 class="modal-title" v-show="editMode" id="addNewLabel">Update Detail Profil Lulusan</h5>
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? updateDetailprofillulusan() : createDetailprofillulusan()">
            <div class="modal-body">
               <div class="form-group">
                <input v-model="form.code" type="text" name="code"
                    placeholder="Code"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('code') }">
                <has-error :form="form" field="code"></has-error>
                </div>

                <div class="form-group">
                <input v-model="form.detail" type="text" name="detail"
                    placeholder="Detail"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('detail') }">
                <has-error :form="form" field="detail"></has-error>
                </div>

                 <div class="form-group">
                     <select name="profil_id"  placeholder="Profil Lulusan" v-model="form.profil_id" id="profil" class="form-control" :class="{ 'is-invalid': form.errors.has('profil_id') }">
                        <option v-for="profil in profillulusan" :key="profil.id" v-bind:value="profil.id">{{ profil.profillulusan }}</option>
                    </select>
                <has-error :form="form" field="profil"></has-error>
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
                detailprofillulusan : [],
                form:new Form({
                    code :'',
                    detail:'',
                    profil_id:''
                })
            }
        },
        methods:{
           updateDetailprofillulusan(){
                this.form.put(URL+'api/detailprofillulusan'+this.form.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                    
                         Fire.$emit('AfterCreate');
                
            },
            editModal(detailprofillulusan){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(detailprofillulusan);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
           deleteDetailprofillulusan(id){
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
                                this.form.delete(URL+'api/detailprofillulusan/'+id).then(()=>{
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
          loadDetailprofillulusan(){
              axios.get(URL+'api/detailprofillulusan').then(data => {
                  this.detailprofillulusan = data.data.data;
              });
          },
          loadprofillulusan(){
              axios.get(URL+'api/profillulusan').then(data => {
                  this.profillulusan = data.data.data;
              });
          },
          createDetailprofillulusan(){
            this.form.post(URL+'api/detailprofillulusan');
            $('#addNew').modal('hide')
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
              Fire.$emit('AfterCreate')
          }
        },
        created() {
            this.loadprofillulusan();
            this.loadDetailprofillulusan();
        }
    }
</script>
