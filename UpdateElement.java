import java.util.Arrays;
import java.util.Scanner;

/**
 * Created by Oliver on 9/19/2017.
 */
public class UpdateElement {
    public static void main(String[] args)
    {
        Scanner input = new Scanner(System.in);
        int[] array = {1, 2, 3, 4, 5, 6, 7, 8, 9, 3, 6, 3, 3, 6, 15};
        System.out.println("Original array: \t"+ Arrays.toString(array));
        System.out.println("What element (index) do you want to replace? ");
        int element = input.nextInt();
        System.out.println("What integer do you want to replace it with? ");
        int replacement = input.nextInt();
        array[element] = replacement;
        System.out.println("New array: \t\t\t"+Arrays.toString(array));
    }
}
