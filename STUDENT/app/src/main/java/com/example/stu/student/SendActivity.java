package com.example.stu.student;

import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;

public class SendActivity extends AppCompatActivity {

    TextView t_no, t_les, t_dt;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_send);

        String s_no=getIntent().getExtras().getString("sn");
        String no=s_no;
        String s_les=getIntent().getExtras().getString("sr");
        String lesson=s_les;
        String s_dt=getIntent().getExtras().getString("sd");
        String date=s_dt;

        t_no=(TextView)findViewById(R.id.txtStuNo);
        t_les=(TextView)findViewById(R.id.txtLesson);
        t_dt=(TextView)findViewById(R.id.txtDate);

        t_no.setText(no);
        t_dt.setText(date);
        t_les.setText(lesson);

        String type="save";

        InsertWorker insertWorker=new InsertWorker(this);
        insertWorker.execute(type, no, lesson, date);



    }
}
