<x-theme title="">

    <section>
        <div class="container">
            <br>
            <br>
            {{-- <div class="section-header text-center">
                <h1 class="h2">เรียนหลักสูตรไหนในคณะวิทยาศาสตร์ที่เหมาะกับคุณ</h1>
            </div> --}}

            <div class="row align-items-center g-4">
                <!-- Content -->
                <div class="col-sm-9">
                    <!-- Title -->
                    <h1 class="m-0 h2 card-title">หลักสูตรในคณะวิทยาศาสตร์ที่เหมาะกับคุณ</h1>
                    <!-- <h2 class="lead1">คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏวไลยอลงกรณ์ ในพระบรมราชูปถัมภ์</h2> -->

                </div>
                <!-- Image -->
                <div class="col-sm-3 text-end">
                    <img src="http://sci.vru.ac.th/home/assets/images/element/Ask.png" class="img-fluid" alt="Ask">
                </div>
            </div>
            <script>
                function randomAnswers() {
                    let size = "<?= count($questions) ?>";
                    // console.log("Random : ",size);

                    for (let i = 0; i < size; i++) {

                        // console.log("Random : ",i);
                        let choose = ["yes", "no"][Math.round(Math.random())];
                        document.querySelector("#flexRadioDefault" + (i + 1) + choose).checked = true;
                    }
                }
            </script>
            <div class="text-center">
                <button class="btn btn-primary" type="button" onclick="randomAnswers()">Random Toggle All </button>
            </div>


            <br>
            <!-- form -->
            <form method="post" action="{{ route('study-match') }}">
                @csrf

                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-xl-1 gutter-2">
                    <?php foreach ($questions as $key => $row) { ?>
                    <div class="col p-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $key + 1 ?>. <?= $row->code ?> | <?= $row->question ?></h5>
                                <div class="card-text " style="font-size:18px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="flexRadioDefault<?= $key + 1 ?>"
                                            id="flexRadioDefault<?= $key + 1 ?>yes" value="<?= $row->code ?>-yes">
                                        <label class="form-check-label" for="flexRadioDefault1"> ใช่ </label>
                                    </div>
                                    <div class="form-check form-check-inline mx-5">
                                        <input class="form-check-input" type="radio"
                                            name="flexRadioDefault<?= $key + 1 ?>"
                                            id="flexRadioDefault<?= $key + 1 ?>no" value="<?= $row->code ?>-no">
                                        <label class="form-check-label" for="flexRadioDefault2"> ไม่ใช่ </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">ส่งแบบสำรวจ</button>
                </div>
            </form>
        </div>
    </section>
</x-theme>