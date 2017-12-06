<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="modal-body">
                <h2>SKU List Database in Spain</h2>
                <hr class="star-primary">

                <?php
                echo '<table class="table table-bordered table-striped table-hover table-condensed table-responsive">';
                echo '<tr>';
                echo '</tr>';
                while (($row = mysqli_fetch_array($skuResult, MYSQLI_ASSOC)) != NULL) {
                    echo '<tr>';
                    echo '<td>' . $row['sku'] . '</td>';
                    echo '</tr>';
                } mysqli_free_result($skuResult);
                echo '</table>';
                ?>
            </div>
        </div>
    </div>
</div>
