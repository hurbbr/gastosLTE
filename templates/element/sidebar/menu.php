<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
<!-- <li class="nav-item has-treeview menu-open">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Aqui já funciona
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="#" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Active Page</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Inactive Page</p>
      </a>
    </li>
  </ul>
</li> -->


<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Pré Cadastros<i class="right fas fa-angle-left"></i></p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?= $this->Url->build(['controller' => 'TipoLancamentos', 'action' => 'index'], ['escape' => false]) ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Tipos de Lançamentos</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= $this->Url->build(['controller' => 'Contas', 'action' => 'index'], ['escape' => false]) ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Contas</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item">
  <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index'], ['escape' => false]) ?>" class="nav-link">
    <i class="far fa-circle nav-icon"></i>
    <p>Usuários</p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?>" class="nav-link bg-danger">
    <i class="fas fa-sign-out-alt"></i>
    <p>Logout</p>
  </a>
</li>