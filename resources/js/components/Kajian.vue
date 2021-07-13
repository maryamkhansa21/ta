<template>
      <div class="container">
          <div class="row mb-2 mt-2">
              <div class="col-sm-7">
                  <pagination :data="kajian" @pagination-change-page="loadKajian"></pagination>
              </div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kajian dan Penetapan Mata Kuliah</h3>
                  <div class="card-tools">
                      <button class="btn btn-success" @click="newModal">Tambah <i class="fas fa-user-plus fa-fw"></i></button>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr>
                      <th>CPL</th>
                      <th>Bahan Kajian</th>
                      <th>Mata Kuliah</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="(kajian, index) in kajian.data" :key="kajian.id">
                      <td>
                          <multiselect v-model="kajian.detailprofillulusan" placeholder="Pilih Kode Profil Lulusan" label="code" track-by="id" :options="detailprofillulusan" :multiple="true" @input="updateDetail"></multiselect>
                      </td>
                      <td>
                          <multiselect style="z-index : 2;position : relative;" v-model="kajian.bahankajian" placeholder="Pilih Bahan Kajian" label="bahankajian" track-by="id" :options="bahankajian" :multiple="true" @input="updateBKajian"></multiselect>
                      </td>
                      <td>
                          <input v-model="kajian.matkul" type="text" name="matkul">
                      </td>
                      <td>
                          <button type="button" class="btn btn-success float-right" @click="updateKajian(kajian)">Simpan</button>
                      </td>
                  </tr>
                  </tbody>
              </table>

              <!-- /.card -->
          </div>
        </div>


          <div class="modal fade" id="addNew" tabindex="-1"  role="dialog"
               aria-labelledby="addNewLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="addNewLabel">Tambah Bahan Kajian</h5>
                          <button type="button" class="close" data-dismiss="modal"
                                  aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <form @submit.prevent="createKajian()">
                          <div class="modal-body">
                              <div class="form-group">
                                  <input v-model="form.matkul" type="text" name="matkul"
                                         placeholder="Matkul"
                                         class="form-control" :class="{ 'is-invalid': form.errors.has('matkul') }">
                                  <has-error :form="form" field="matkul"></has-error>
                              </div>
                              <div class="form-group">
                                  <label class="typo__label">Detail Profil Lulusan</label>
                                  <multiselect v-model="form.details" :allow-empty="true" placeholder="Pilih Kode Profil Lulusan" label="code" track-by="id" :options="detailprofillulusan" :multiple="true" @input="updateDetail"></multiselect>
                              </div>
                              <div class="form-group">
                                  <label class="typo__label">Bahan Kajian</label>
                                  <multiselect v-model="form.bahankajians" :allow-empty="true" placeholder="Pilih Bahan Kajian" label="bahankajian" track-by="id" :options="bahankajian" :multiple="true" @input="updateBKajian"></multiselect>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Create</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>

      </div>
</template>

<script>
    const URL = "http://localhost:8000/";
    import Multiselect from 'vue-multiselect';
    export default {

        components: {
            Multiselect
        },
        data () {
            return {
                editMode: false,
                detailprofillulusan : [],
                bahankajian : [],
                kajian : [],
                  form:new Form({
                    details :[],
                    bahankajians :[],
                    matkul :''
                }),
                detailsById : [],
                bKajianById : [],
            }
        },
       methods:{
           updateDetail(details) {
               let detailsById = [];

               details.forEach((detail) => {
                   detailsById.push(detail.id);
               });

               this.detailsById = detailsById;
           },
           updateBKajian(bkajians) {
               let bKajianById = [];

               bkajians.forEach((bkajian) => {
                   bKajianById.push(bkajian.id);
               });

               this.bKajianById = bKajianById;
           },
            updateKajian(kajian){
                if(this.detailsById.length==0){
                    kajian.detailprofillulusan.forEach(data=>{
                        this.detailsById.push(data.id)
                    })
                } 
                if(this.bKajianById.length==0){
                    kajian.bahankajian.forEach(data=>{
                        this.bKajianById.push(data.id)
                    })
                } 
                this.form.matkul = kajian.matkul;
                this.form.details = this.detailsById;
                this.form.bahankajians = this.bKajianById;
                this.form.put(URL+'api/kajian/'+kajian.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                Fire.$emit('AfterCreated');
                this.details = [];
                this.bahankajians = [];
                this.form.reset();

            },
            editModal(kajian){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(kajian);
            },
            newModal(){
                this.detailsById = [];
                this.bKajianById = [];
                this.form.reset();
                $('#addNew').modal('show');
            },
           deleteKajian(id){
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
                                this.form.delete(URL+'api/kajian/'+id).then(()=>{
                                        Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreated');
                                }).catch(()=> {
                                    swal("Failed!", "There was something wronge.", "warning");
                                });
                         }
                    })
            },
         loadKajian(page){
             if (typeof page === 'undefined') {
                 page = 1;
             }
             let uri = URL+'api/kajian?page=' + page;
             axios.get(uri).then(response => {
                 this.kajian = response.data
             });
         },
          loadDetailprofillulusan(){
              axios.get(URL+'api/detailprofillulusan').then(data => {
                  this.detailprofillulusan = data.data;
              });
          },
          loadBahankajian(){
              axios.get(URL+'api/bahankajian').then(data => {
                  this.bahankajian = data.data;
              });
          },
          createKajian(){
            this.form.details = this.detailsById;
            this.form.bahankajians = this.bKajianById;
            this.form.post(URL+'api/kajian');

              this.detailsById = [];
              this.bKajianById = [];
            $('#addNew').modal('hide');
            Fire.$emit('AfterCreated');
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
          }
        },
        created() {
            this.loadKajian();
            this.loadDetailprofillulusan();
            this.loadBahankajian();
            Fire.$on('AfterCreated', () => {
                this.loadKajian();
            })
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
.card {
    background-color: rgba(255, 255, 255, 1);
}
</style>


