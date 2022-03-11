<?php require ("config.php"); 
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <?php include(INCLUDE_DIR . "head.php"); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

  
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include(INCLUDE_DIR . "sidebar.php"); ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inventário</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Inventário</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <table id="tableInv" class="table table-bordered table-hover">
              <thead>
                <tr>
                      <th>Nome do Produto</th>
                      <th>Categoria</th>
                      <th>SubCategoria</th>
                      <th>Quantidade</th>
                      <th>Preço S/ IVA</th>
                      <th>IVA</th>
                      <th>Preço</th>
                    </tr>
              </thead>
              <tbody>
                  <?php foreach(lista_inv() as $us) { ?>

                    <tr>
                      <td><?php echo $us["nome_produto"]; ?></td>
                      <td><?php echo $us["nome_categoria"]; ?></td>
                      <td><?php echo $us["nome_subcategoria"]; ?></td>
                      <td><?php echo $us["quant_disp"]; ?></td>
                      <td><?php echo $us["preco"]; ?></td>
                      <td><?php echo $us["valor_iva"]; ?></td>
                      <td><?php echo $us["preco_civa"]; ?></td>
                      <td><button data-id="<?php echo $us["cod_produto"]; ?>"type="button" class="btn btn-secondary editProd" data-toggle="modal" data-target="#modalEdit2">
                      Editar
                      </button>
                      &nbsp
                      <button data-id="<?php echo $us["cod_produto"]; ?>" class="btn btn-sm btn-danger eliminarProd"> <i class='fa fa-trash'></i> </button></td>
                    </tr>
                    </tr>
                  <?php } ?>
                  </tbody>
            </table>
          </div>
        </div>
        <button class='btn btn-primary addProd' data-toggle="modal" data-target="#modalAdd">Adicionar</button>

        <div class="modal fade" id="modalEdit2" tabindex="-1" role="dialog" aria-labelledby="modalEdit2" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Editar produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="editProd" method="POST">
                  <input type="hidden" id="editProd_id" name="editProd_id">
                  <label> Nome: </label>
                  <br>
                  <input type="text" id="nome_produto" name="nome_produto" size="25" 
                  placeholder="Nome">
                  <br>
                  <label> Categoria </label>
                  <br>
                  <select id="cod_categoria" name="cod_categoria" class="changeCategoria">
                      <option value="0">Escolha a categoria</option>
                      <?php foreach(getCat() as $cat) {  ?>
                           <option value="<?php echo $cat["cod_categoria"]; ?>"><?php echo $cat["nome_categoria"]; ?></option>
                      <?php } ?>
                  </select>
                  <br>
                  <label> SubCategoria </label>
                  <br>
                  <select id="cod_subcategoria" name="cod_subcategoria" class="subcatSelect">
                      <option value="0">Escolha a subcategoria</option>
                      <?php foreach(getSubCat() as $subcat) {  ?>
                           <option value="<?php echo $subcat["cod_subcategoria"]; ?>"><?php echo $subcat["nome_subcategoria"]; ?></option>
                      <?php } ?>
                  </select>
                  <br>
                  <label> Quantidade </label>
                  <br>
                  <input type="text" id="quant_disp" name="quant_disp" size="25" placeholder="Quantidade">
                  <br>
                  <label> Preço </label>
                  <br>
                  <input type="text" id="preco" name="preco" size="25" placeholder="Preço">
                  <br><br>
                  <button type="submit" class="btn btn-primary block full-width m-b">Editar</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Adicionar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="addProd" method="POST">
                  <label> Nome: </label>
                  <br>
                  <input type="text" id="nome_produto" name="nome_produto" size="25" 
                  placeholder="Nome">
                  <br>
                  <label> Categoria </label>
                  <br>
                  <select id="cod_categoria" name="cod_categoria" class="changeCategoria">
                      <option value="0">Escolha a categoria</option>
                      <?php foreach(getCat() as $cat) {  ?>
                           <option value="<?php echo $cat["cod_categoria"]; ?>"><?php echo $cat["nome_categoria"]; ?></option>
                       <?php } ?>
                  </select>
                  <br>
                  <label> SubCategoria </label>
                  <br>
                  <select id="cod_subcategoria" name="cod_subcategoria" class="subcatSelect">
                      <option value="0">Escolha a subcategoria</option>
                      
                  </select>
                  <br>
                  <label> Quantidade </label>
                  <br>
                  <input type="text" id="quant_disp" name="quant_disp" size="25" placeholder="Quantidade">
                  <br>
                  <label> Preço </label>
                  <br>
                  <input type="text" id="preco" name="preco" size="25" placeholder="Preço">
                  <br><br>
                  <button type="submit" class="btn btn-primary block full-width m-b">Adicionar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<?php include(INCLUDE_DIR . "scripts.php"); ?>
</body>
</html>
