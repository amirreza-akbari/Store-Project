import java.util.HashMap;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        // Create a HashMap to store product codes and their names
        HashMap<String, String> products = new HashMap<>();
        
        // Add product codes and names to the HashMap
        products.put("101", "Laptop");
        products.put("102", "Mobile Phone");
        products.put("103", "Television");
        products.put("104", "Refrigerator");
        products.put("105", "Washing Machine");
        products.put("106", "Microwave");
        products.put("107", "Camera");
        products.put("108", "Hair Dryer");
        products.put("109", "Juicer");
        products.put("110", "Tablet");

        // Ask the user to enter a product code
        System.out.println("Please enter the product code:");

        String productCode = scanner.nextLine();

        // Check and display product name based on the entered code
        if (productCode.equals("0")) {
            // If user enters "0", show an error message and exit the program
            System.out.println("Error! Zero entered. The program will terminate.");
            System.exit(0);
        } else if (products.containsKey(productCode)) {
            // Display the product name if the code exists in the HashMap
            System.out.println("Product name: " + products.get(productCode));
        } else {
            // If the product code is not found
            System.out.println("Product code not found.");
        }

        scanner.close();
    }
}
