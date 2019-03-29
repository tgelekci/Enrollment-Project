package com.example.stu.student;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

public class MainActivity extends AppCompatActivity {

    EditText StdnoEt, StdpassEt;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        StdnoEt=(EditText) findViewById(R.id.etStudentNo);
        StdpassEt=(EditText)findViewById(R.id.etStudentPass);

    }


    public void OnLogin(View view){
        String stuno=StdnoEt.getText().toString();
        String stupass=StdpassEt.getText().toString();
        String type="login";

        BackgroundWorker backgroundWorker=new BackgroundWorker(this);
        backgroundWorker.execute(type, stuno, stupass);
    }
}
