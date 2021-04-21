<template>
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Perumusan Capaian Pembelajaran Lulusan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">              
                  <div class="btn-group">
                    <button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true" aria-expanded="false">
                    <span>{{cplprodi.unsur}}</span>
                    </button>
                  </div> 
                  </div></div>
                  </div>
                  <div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr role="row">
                    <th>Code</th>
                    <th>CPL</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="detailprofillulusan in detailprofillulusan" :key="detailprofillulusan.id">
                    <td>{{detailprofillulusan.code}}</td>
                    <td>{{detailprofillulusan.detail}}</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"></div></div></div>
              </div>
              <!-- /.card-body -->
            </div>
</template>

<script>
    const URL = "http://localhost:8000/";
    export default {
        data () {
            return {
                detailprofillulusan : [],
                cplprodi : []
            }
        },
        created() {
          this.loadDetailprofillulusan();      
        },
        methods: {
          loadDetailprofillulusan(){
              axios.get(URL+'api/detailprofillulusan').then(data => {
                  this.detailprofillulusan = data.data.data;
              });
          }
        }
    }
</script>
