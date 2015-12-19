<div id="App" class="face">
  <div id="header">
    <div class="container">
      <div class="row">
        <h2 class="tit text-center">
            <?=(isset($tit)?$tit:'SELECT')?>
        </h2>
      </div>
    </div>
  </div>
  <div id="con">
    <div class="container">
      <div class="row" id="selectpage">
        <!--S:Contents -->
        <div class="imgs">
            <div id="logotitle">
                <img src="/asset/logotitle.png">
            </div>
            <a href="/next?num=2" class="imgbutton">
                <img src="/asset/gotext.png">
            </a>
            <a href="#" class="imgbutton disabled">
                <img src="/asset/gocall.png">
            </a>
        </div>
        <style>
            #selectpage {
                background-color: #D4D2BE;
            }
            .disabled {
                cursor: disabled;
                filter: grayscale(30%);
            }
            .imgs {
                position: absolute;
                bottom: 0;
            }
            .imgbutton img {
                width: 100%;
                height: auto;
            }
        </style>
        
        
        <!-- <p class="text-center d_description" style="margin-top:20%">
          <span style="font-size:1.2em">100%</span>퇴근 가능한<br>
          절적한 이유를 제공해주는 치밀한<br>
          <span>"퇴근 핑계 제공 서비스"</span>
        </p>
        <p class="text-center" style="margin-top:20%">
          <div class="red-button text-center">
            <span class="out_hell" onclick="location.href='/next?num=0'">탈출하기</span>
          </div>
        </p> -->
        <!--E:Contents -->
      </div>
    </div>
  </div>
</div>
