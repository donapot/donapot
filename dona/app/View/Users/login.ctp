<div class="breadcrumb-container">
    <div class="container">
       
    </div>
  <?php echo $this->Session->flash();?>
</div>
<!-- breadcrumb end -->

<!-- main-container start -->
<div class="main-container" >
    <div class="container">
        <div class="row">
            <!-- main start -->
            <div data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                <div class="form-block center-block p-30 light-gray-bg border-clear">
                    <h2 class="title">ログイン</h2>
                        <div class="users_form">
                            <?php
                                echo $this->Session->flash();
                                echo $this->Form->create('User'); ?>
                                <?php echo $this->Form->input('username', array('label' => 'ユーザー名', 'class' => 'form-control', 'placeholder'=>'User Name')); ?>
                                <?php echo $this->Form->input('password', array('label' => 'パスワード', 'class' => 'form-control', 'placeholder'=>'password')); ?>
                  <table>
                    <tbody class="loginTable">
                    <tr>
                      <td>
                                <?php
                                $options =
                                    array(
                                        'label' => 'ログイン',
                                        'class' => 'btn btn-default',
                                    );
                                    echo $this->Form->end($options);
                                ?>
                      </td>
                    </tr>
                  </tbody>
               </table>
                </div>
                </div>
                <!-- main end -->
            </div>
    </div>
</div>
<!-- main-container end -->