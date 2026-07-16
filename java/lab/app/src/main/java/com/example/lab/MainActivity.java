package com.example.lab;


import android.os.Bundle;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {

    private WebView webView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        webView = findViewById(R.id.webView);


        webView.getSettings().setJavaScriptEnabled(true);


        webView.getSettings().setDomStorageEnabled(true);


        webView.setWebViewClient(new WebViewClient());

        webView.loadUrl("https://b.mrbackend.ir");
    }


    @Override
    public void onBackPressed() {
        if (webView.canGoBack()) {
            webView.goBack();
        } else {
            super.onBackPressed();
        }
    }
}