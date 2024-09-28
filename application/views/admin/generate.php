<!-- Sidebar -->
<?php include 'sidebar.php' ?>
<!-- End Sidebar -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Forms</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Basic Form</a>
                    </li>
                </ul>
            </div>
           
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        
                        <?php echo $this->session->flashdata('massage') ?>
                        <form action="<?php echo base_url('administrator/simpanCetak') ?>" method="POST">
                            <div class="card-body">
                                 <div class="row">
                <div class="col-xl-4">
                  <h2> Generate GPON</h2> 
                </div>
            </div>
                               <div class="row">
      <div class="col-md-6 mt-4">
        <b for="A">Interface A:</b>
        <input type="text" id="A" class="form-control border border-primary" placeholder="Enter Interface A (e.g. gpon-olt_1/1/7)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="B">ONU Number B:</b>
        <input type="text" id="B" class="form-control border border-primary" placeholder="Enter ONU Number B (e.g. 13)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="C">Serial Number C:</b>
        <input type="text" id="C" class="form-control border border-primary" placeholder="Enter Serial Number C (e.g. ZTEGCC599CD3)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="D">Interface D:</b>
        <input type="text" id="D" class="form-control border border-primary" placeholder="Enter Interface D (e.g. gpon-onu_1/1/7:13)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="E">Name E:</b>
        <input type="text" id="E" class="form-control border border-primary" placeholder="Enter Name E (e.g. DHARMA AJI NUGRAHA)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="F">Description F:</b>
        <input type="text" id="F" class="form-control border border-primary" placeholder="Enter Description F (e.g. 13$$DHARMA AJI NUGRAHA$$)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="G">Profile G:</b>
        <input type="text" id="G" class="form-control border border-primary" placeholder="Enter Profile G (e.g. 60M)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="H">Profile H:</b>
        <input type="text" id="H" class="form-control border border-primary" placeholder="Enter Profile H (e.g. 100M)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="I">Profile I (TR069):</b>
        <input type="text" id="I" class="form-control border border-primary" placeholder="Enter Profile I (e.g. TR069)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="J">Upstream J (T1):</b>
        <input type="text" id="J" class="form-control border border-primary" placeholder="Enter Upstream J (e.g. 60M)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="K">Downstream K (T1):</b>
        <input type="text" id="K" class="form-control border border-primary" placeholder="Enter Downstream K (e.g. 60M)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="L">Upstream L (T2):</b>
        <input type="text" id="L" class="form-control border border-primary" placeholder="Enter Upstream L (e.g. 100M)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="M">Downstream M (T2):</b>
        <input type="text" id="M" class="form-control border border-primary" placeholder="Enter Downstream M (e.g. 100M)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="N">Upstream N (TR069):</b>
        <input type="text" id="N" class="form-control border border-primary" placeholder="Enter Upstream N (e.g. 2M)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="O">Downstream O (TR069):</b>
        <input type="text" id="O" class="form-control border border-primary" placeholder="Enter Downstream O (e.g. 2M)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="P">User VLAN P (INTERNET):</b>
        <input type="text" id="P" class="form-control border border-primary" placeholder="Enter User VLAN P (e.g. 120)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="Q">VLAN Q (INTERNET):</b>
        <input type="text" id="Q" class="form-control border border-primary" placeholder="Enter VLAN Q (e.g. 120)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="R">User VLAN R (HOTSPOT):</b>
        <input type="text" id="R" class="form-control border border-primary" placeholder="Enter User VLAN R (e.g. 10)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="S">VLAN S (HOTSPOT):</b>
        <input type="text" id="S" class="form-control border border-primary" placeholder="Enter VLAN S (e.g. 10)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="T">User VLAN T (TR69):</b>
        <input type="text" id="T" class="form-control border border-primary" placeholder="Enter User VLAN T (e.g. 100)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="U">VLAN U (TR69):</b>
        <input type="text" id="U" class="form-control border border-primary" placeholder="Enter VLAN U (e.g. 100)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="V">PON-ONU-MNG Interface V:</b>
        <input type="text" id="V" class="form-control border border-primary" placeholder="Enter Interface V (e.g. gpon-onu_1/1/7:13)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="W">VLAN W (INTERNET Service):</b>
        <input type="text" id="W" class="form-control border border-primary" placeholder="Enter VLAN W (e.g. 120)">
      </div>
      <div class="col-md-6 mt-4">
        <b for="X">VLAN X (HOTSPOT Service):</b>
        <input type="text" id="X" class="form-control border border-primary" placeholder="Enter VLAN X (e.g. 10)">
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-4">
        <b for="Y">VLAN Y (TR069 Service):</b>
        <input type="text" id="Y" class="form-control border border-primary" placeholder="Enter VLAN Y (e.g. 100)">
      </div>
    </div>

    <!-- Generate Button -->
    <div class="row">
      <div class="col-md-2 text-center">
        <button class="btn btn-primary mt-4" onclick="generateConfig()">Generate Configuration</button>
      </div>
    </div>

    <!-- Output Section -->
    <h2 class="mt-4">Generated Configuration:</h2>
    <pre id="output"></pre>
  </div>

  <!-- JavaScript to Generate Dynamic Configuration -->
  <script>
    function generateConfig() {
      // Get values from input fields
      const A = document.getElementById('A').value;
      const B = document.getElementById('B').value;
      const C = document.getElementById('C').value;
      const D = document.getElementById('D').value;
      const E = document.getElementById('E').value;
      const F = document.getElementById('F').value;
      const G = document.getElementById('G').value;
      const H = document.getElementById('H').value;
      const I = document.getElementById('I').value;
      const J = document.getElementById('J').value;
      const K = document.getElementById('K').value;
      const L = document.getElementById('L').value;
      const M = document.getElementById('M').value;
      const N = document.getElementById('N').value;
      const O = document.getElementById('O').value;
      const P = document.getElementById('P').value;
      const Q = document.getElementById('Q').value;
      const R = document.getElementById('R').value;
      const S = document.getElementById('S').value;
      const T = document.getElementById('T').value;
      const U = document.getElementById('U').value;
      const V = document.getElementById('V').value;
      const W = document.getElementById('W').value;
      const X = document.getElementById('X').value;
      const Y = document.getElementById('Y').value;

      // GPON Configuration Template
      const configTemplate = `
conf t
interface ${A}
  onu ${B} type ALL-ONT sn ${C}
!
interface ${D}
  name ${E}
  description ${F}
  sn-bind enable sn
  tcont 1 name T1 profile ${G}
  tcont 2 name T2 profile ${H}
  tcont 3 name TR069 profile ${I}
  gemport 1 name T1 tcont 1
  gemport 1 traffic-limit upstream ${J} downstream ${K}
  encrypt 1 enable downstream
  gemport 2 name T2 tcont 2
  gemport 2 traffic-limit upstream ${L} downstream ${M}
  encrypt 2 enable downstream
  gemport 3 name TR069 tcont 3
  gemport 3 traffic-limit upstream ${N} downstream ${O}
  encrypt 3 enable downstream
  service-port 1 vport 1 user-vlan ${P} vlan ${Q}
  service-port 1 description INTERNET
  service-port 2 vport 2 user-vlan ${R} vlan ${S}
  service-port 2 description HOTSPOT
  service-port 3 vport 3 user-vlan ${T} vlan ${U}
  service-port 3 description TR69
!
end
conf t
pon-onu-mng ${V}
  service INTERNET gemport 1 vlan ${W}
  service HOTSPOT gemport 2 vlan ${X}
  service TR069 gemport 3 vlan ${Y}
!
end
wr
`;

      // Display the generated configuration
      document.getElementById('output').innerText = configTemplate;
    }
  </script>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>

<!-- <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.themekita.com">
                            ThemeKita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Help
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
            </div>
        </div>
    </footer>-->
</div>


<script>
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true
    });
    $(document).ready(function () {
        $('.select22').select2();
    });
</script>