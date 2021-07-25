<template>
      <div class="container">
          <div class="row mb-2 mt-2">
              <div class="col-sm-7">
                  <pagination :data="pembentukanmatkul" @pagination-change-page="loadPembentukanmatkul"></pagination>
              </div>
          </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pembentukan Mata Kuliah</h3>
                  <div class="card-tools">
                      <button class="btn btn-success" @click="newModal">Tambah <i class="fas fa-user-plus fa-fw"></i></button>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr>
                      <th>Mata Kuliah</th>
                      <th>Bahan Kajian</th>
                      <th>Tingkat Kedalaman Mata Kuliah</th>
                      <th>Total Tingkat Kedalaman</th>
                      <th>Total Semua Tingkat Kedalaman</th>
                      <th>Besaran SKS</th>
                      <th>Pembulatan SKS</th>
                      <th>Level Psikomotorik Mata Kuliah</th>
                      <th>Jenis Mata Kuliah</th>
                      <th>SKS/Jam Mata Kuliah</th>
                      <th>Semester</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="(pembentukanmatkul, index) in pembentukanmatkul" :key="pembentukanmatkul.id">
                      <td>{{pembentukanmatkul.detailmatkul.dtlmatkul}}</td>
                      <td>{{pembentukanmatkul.bahankajian}}</td>
                     <td>
                          <select name="tk" v-model="dataTKNew[index].dataTk1" v-bind:value="pembentukanmatkul.tk" v-on:input="jumlahtk(index)">
                            <option v-for="tk in tk_data" v-bind:key="tk" v-bind:value="tk">{{tk}}</option>
                          </select>
                          <select name="tk" v-model="dataTKNew[index].dataTk2" v-bind:value="pembentukanmatkul.tk" v-on:input="jumlahtk(index)">
                            <option v-for="tk in tk_data" v-bind:key="tk" v-bind:value="tk">{{tk}}</option>
                          </select>
                          <select name="tk" v-model="dataTKNew[index].dataTk3" v-bind:value="pembentukanmatkul.tk" v-on:input="jumlahtk(index)">
                            <option v-for="tk in tk_data" v-bind:key="tk" v-bind:value="tk">{{tk}}</option>
                          </select>
                          <select name="tk" v-model="dataTKNew[index].dataTk4" v-bind:value="pembentukanmatkul.tk" v-on:input="jumlahtk(index)">
                            <option v-for="tk in tk_data" v-bind:key="tk" v-bind:value="tk">{{tk}}</option>
                          </select>
                          <select name="tk" v-model="dataTKNew[index].dataTk5" v-bind:value="pembentukanmatkul.tk" v-on:input="jumlahtk(index)">
                            <option v-for="tk in tk_data" v-bind:key="tk" v-bind:value="tk">{{tk}}</option>
                          </select>

                      </td>
                      <td>{{pembentukanmatkul.totaltk}}</td>
                      <td>{{pembentukanmatkul.alltotaltk}}</td>
                      <td>{{pembentukanmatkul.besarsks}}</td>
                      <td>{{pembentukanmatkul.pembulatansks}}</td>
                      <td> <select name="psikomotorik" v-model="pembentukanmatkul.psikomotorik" id="psikomotorik"  v-bind:value="pembentukanmatkul.psikomotorik" v-on:input="jenisMatkul(index)">
                            <option v-for="psikomotorik in psikomotorik_data" v-bind:key="psikomotorik" v-bind:value="psikomotorik">{{psikomotorik}}</option>
                          </select>
                      </td>
                      <td>
                          <div v-if="pembentukanmatkul.psikomotorik === 'P1'" >
                            Teori
                            </div>
                            <div v-else-if="pembentukanmatkul.psikomotorik === 'P2'">
                            Teori
                            </div>
                            <div v-else-if="pembentukanmatkul.psikomotorik === 'P3'">
                            Praktek
                            </div>
                            <div v-else-if="pembentukanmatkul.psikomotorik === 'P4'">
                            Praktek
                            </div>
                            <div v-else-if="pembentukanmatkul.psikomotorik === 'P5'">
                            Praktek
                            </div>
                            <div v-else>
                            -
                            </div>

                      </td>
                      <td>
                            <div v-if="pembentukanmatkul.jenismatkul === 'Praktek'" >
                            {{pembentukanmatkul.pembulatansks*3}}
                            </div>
                            <div v-else-if="pembentukanmatkul.jenismatkul === 'Teori'" >
                            {{pembentukanmatkul.pembulatansks}}
                            </div>
                            <div v-else>
                            -
                            </div>
                      </td>
                      <td>{{pembentukanmatkul.smt}}</td>
                      <td>
                        <button type="button" class="btn btn-success float-right" @click="updatePembentukanmatkul(pembentukanmatkul)">Simpan</button>
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
                          <h5 class="modal-title" id="addNewLabel">Tambah Semester</h5>
                          <button type="button" class="close" data-dismiss="modal"
                                  aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <form @submit.prevent="createPembentukanmatkul()">
                          <div class="modal-body">
                              <div class="form-group">
                                <select name="smt" v-model="smt" id="smt" class="form-control" :class="{ 'is-invalid': form.errors.has('smt') }">
                                        <option value="Semester 1">Semester 1</option>
                                        <option value="Semester 2">Semester 2</option>
                                        <option value="Semester 3">Semester 3</option>
                                        <option value="Semester 4">Semester 4</option>
                                        <option value="Semester 5">Semester 5</option>
                                        <option value="Semester 6">Semester 6</option>
                                        <option value="Semester 7">Semester 7</option>
                                        <option value="Semester 8">Semester 8</option>
                                </select>
                            <has-error :form="form" field="smt"></has-error>
                        </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 1</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[0]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 2</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[1]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 3</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[2]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 4</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[3]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 5</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[4]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 6</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[5]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 7</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[6]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 8</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[7]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 9</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[8]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 10</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[9]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 11</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[10]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 12</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[11]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 13</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[12]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 14</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[13]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label class="typo__label">Mata Kuliah 15</label>
                                    <select name="dtlmatkul_id"  placeholder="Mata Kuliah" v-model="dataMatkul[14]" :allow-empty="true" id="dtlmatkul" class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul_id') }">
                                        <option v-for="dtlmatkul in detailmatkul" :key="dtlmatkul.id" v-bind:value="dtlmatkul.id">{{ dtlmatkul.dtlmatkul }}</option>
                                    </select>
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
                pembentukanmatkul : [],
                detailmatkul : [],
                kajian : [],
                bahankajian : [],
                bahankajian_kajian : [],
                form:new Form({
                    
                    totaltk:'',
                    alltotaltk:'',
                    besarsks:'',
                    pembulatansks:'',
                    psikomotorik:'',
                    jenismatkul:'',
                    jam:'',
                    
                    
                    

                }),
                smt : '',
                dataTKNew : [],
                dataMatkul : [],
                dtlmatkulsById : [],
                bKajiansById : [],
                bahankajian_id:[],
               

                 tk_data : [
                  1,
                  2,
                  3,
                  4,
                  5
                ],
                psikomotorik_data : [
                  "P1",
                  "P2",
                  "P3",
                  "P4",
                  "P5"
                ],
            }
        },
       mounted() {
            for(var i=0;i<75;i++){
                this.dataTKNew.push({
                    dataTk1 : 0,
                    dataTk2 : 0,
                    dataTk3 : 0,
                    dataTk4 : 0,
                    dataTk5 : 0,
                })
            }
       },
   
       methods:{
           jumlahtk(index){
               
               this.pembentukanmatkul[index].totaltk =parseInt(this.dataTKNew[index].dataTk1, 10) + parseInt(this.dataTKNew[index].dataTk2, 10) + parseInt(this.dataTKNew[index].dataTk3, 10) + parseInt(this.dataTKNew[index].dataTk4, 10) + parseInt(this.dataTKNew[index].dataTk5, 10); 
               let alltk = 0;
               this.pembentukanmatkul.forEach((item) =>{
                   alltk += item.totaltk;
               })
               for(let i=0; i < this.pembentukanmatkul.length; i++){
                  this.pembentukanmatkul[i].alltotaltk = alltk;
                }
               for(let i=0; i < this.pembentukanmatkul.length; i++){
                  this.pembentukanmatkul[i].besarsks = (this.pembentukanmatkul[i].totaltk / this.pembentukanmatkul[i].alltotaltk) * 144;
                  this.pembentukanmatkul[i].pembulatansks = this.pembentukanmatkul[i].besarsks.toFixed(0)
               
           }
           },
           jenisMatkul(index){

                const grupTeori = ['P1', 'P2'];
                if(grupTeori.includes(this.pembentukanmatkul[index].psikomotorik)) {
                    this.pembentukanmatkul[index].jenismatkul = 'Teori';
                    this.pembentukanmatkul[index].jam = this.pembentukanmatkul[index].pembulatansks;
                }else{
                    this.pembentukanmatkul[index].jenismatkul = 'Praktek';
                    this.pembentukanmatkul[index].jam = this.pembentukanmatkul[index].pembulatansks*3
                }
                
               
            },
           
           updateDetail(dtlmatkuls) {
               let dtlmatkulsById = [];

               dtlmatkuls.forEach((dtlmatkul) => {
                   detailsById.push(dtlmatkul.id);
               });

               this.dtlmatkulsById = dtlmatkulsById;
           },
           updatePembentukanmatkul(pembentukanmatkul){
                
                this.form.totaltk = pembentukanmatkul.totaltk;
                this.form.alltotaltk = pembentukanmatkul.alltotaltk;
                this.form.psikomotorik = pembentukanmatkul.psikomotorik;
                this.form.besarsks = pembentukanmatkul.besarsks;
                this.form.pembulatansks = pembentukanmatkul.pembulatansks;
                this.form.jam = pembentukanmatkul.jam;
                this.form.jenismatkul = pembentukanmatkul.jenismatkul;
                
                this.form.put(URL+'api/pembentukanmatkul/'+pembentukanmatkul.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                Fire.$emit('AfterCreated');
                this.form.reset();

            },
            editModal(pembentukanmatkul){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(pembentukanmatkul);
            },
             newModal(){
                this.dtlmatkulsById = [];
                this.bKajianById = [];
                this.form.reset();
                $('#addNew').modal('show');
            },
           deletePembentukanmatkul(id){
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
                                this.form.delete(URL+'api/pembentukanmatkul/'+id).then(()=>{
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
          loadPembentukanmatkul(){
              axios.get(URL+'api/pembentukanmatkul').then(data => {
                  this.pembentukanmatkul = data.data;
              });
         },
         loadpembentukanmatkul(){
              axios.get(URL+'api/bkajian').then(data => {
                  this.bahankajian = data.data; 
              });
         },
          loadDetailmatkul(){
              axios.get(URL+'api/detailmatkul').then(data => {
                  this.detailmatkul = data.data;
                  console.log(this.detailmatkul)

              });
          },
           loadKajian(){
              axios.get(URL+'api/bkajian').then(data => {
                  this.kajian = data.data;
              });
          },
          createPembentukanmatkul(){
            var detailMatkulArray = [];
            this.dataMatkul.forEach(data=>{
                detailMatkulArray.push({
                    dtlmatkul_id : data,
                    smt : this.smt
                });
            })
            axios.post(URL+'api/pembentukanmatkul', {dataMatkul :detailMatkulArray});
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
            this.loadPembentukanmatkul();
            this.loadpembentukanmatkul();
            this.loadDetailmatkul();
            this.loadKajian();
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
.card {
    background-color: rgba(255, 255, 255, 1);
}
</style>