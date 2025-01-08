import java.util.HashMap;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        // ایجاد یک HashMap برای ذخیره کد کالا و نام آن‌ها
        HashMap<String, String> کالاها = new HashMap<>();
        
        // اضافه کردن کالاها به HashMap (کد کالا به همراه نام کالا)
        کالاها.put("101", "لپ تاپ");
        کالاها.put("102", "گوشی موبایل");
        کالاها.put("103", "تلویزیون");
        کالاها.put("104", "یخچال");
        کالاها.put("105", "ماشین لباسشویی");
        کالاها.put("106", "میکروویو");
        کالاها.put("107", "دوربین عکاسی");
        کالاها.put("108", "سشوار");
        کالاها.put("109", "آبمیوه‌گیری");
        کالاها.put("110", "تبلت");

        // دریافت کد کالا از کاربر
        System.out.println("لطفاً کد کالا را وارد کنید:");

        String کدکالا = scanner.nextLine();

        // بررسی و نمایش نام کالا براساس کد وارد شده
        if (کالاها.containsKey(کدکالا)) {
            System.out.println("نام کالا: " + کالاها.get(کدکالا));
        } else if (کدکالا.equals("0")) {
            // در صورتی که کاربر صفر وارد کند، پیغام خطا و خروج از برنامه
            System.out.println("خطا! مقدار صفر وارد شد. برنامه خاتمه می‌یابد.");
            System.exit(0);
        } else {
            System.out.println("کد کالا یافت نشد.");
        }

        scanner.close();
    }
}

