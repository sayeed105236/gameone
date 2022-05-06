<footer class="footer">
    <div class="footer-body">
      <?php
      $company =App\Models\Company::first();
       ?>
        <!-- <ul class="left-panel list-inline mb-0 p-0">
            <li class="list-inline-item"><a href="../dashboard/extra/privacy-policy.html" class="text-white">Privacy Policy</a></li>
            <li class="list-inline-item"><a href="../dashboard/extra/terms-of-service.html" class="text-white">Terms of Use</a></li>
        </ul> -->
        <div class="right-panel">
            @if($company->company_name != null)
              ©<script>document.write(new Date().getFullYear())</script> All Rght Reserved {{$company->company_name}} .
              @else
            ©<script>document.write(new Date().getFullYear())</script> All Rght Reserved COMPANY NAME .
            @endif
        </div>
    </div>
</footer>
