package com.example.stu.student;

import android.app.Activity;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.google.zxing.integration.android.IntentIntegrator;
import com.google.zxing.integration.android.IntentResult;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

public class ScannerActivity extends AppCompatActivity {

    private Button qrScn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_scanner);

        qrScn=(Button)findViewById(R.id.btnScan);
        final Activity activity=this;

        qrScn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                IntentIntegrator integrator=new IntentIntegrator(activity);
                integrator.setDesiredBarcodeFormats(IntentIntegrator.QR_CODE_TYPES);
                integrator.setPrompt("SCAN THE QR CODE FOR SAVING YOUR INFORMATION TO THE INSPECTION");
                integrator.setCameraId(0);
                integrator.setBeepEnabled(true);
                integrator.setBarcodeImageEnabled(false);
                integrator.initiateScan();
            }
        });

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        IntentResult result=IntentIntegrator.parseActivityResult(requestCode, resultCode, data);
        if(result!=null){
            if ((result.getContents()==null)){
                Toast.makeText(this, "You Cancelled The Scan Process", Toast.LENGTH_LONG).show();
            }
            else{

                Calendar c = Calendar.getInstance();
                SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
                String strDate = sdf.format(c.getTime());

                String taken_stu_num=getIntent().getExtras().getString("stuno_after_scan");
                String taken_no=taken_stu_num;
                String result_send=result.getContents().toString();

                Intent s=new Intent(ScannerActivity.this, SendActivity.class);
                s.putExtra("sr", result_send);
                s.putExtra("sd", strDate);
                s.putExtra("sn", taken_no);

                startActivity(s);
            }
        }
        else  {
            super.onActivityResult(requestCode, resultCode, data);
        }
    }
}
