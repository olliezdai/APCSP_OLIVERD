import java.util.Arrays;
import java.util.Scanner;

/**
 * Created by Oliver on 9/11/2017.
 */
public class DeleteIndex {
    public static void main(String[] args)
    {
        Scanner input = new Scanner(System.in);
        int[] array = {1, 2, 3, 4, 5, 6, 7, 8};
        int[] array2 = new int[array.length-1];
        System.out.println("What index do you want to delete? ");
        int index = input.nextInt();
        for(int i = 0; i < array.length; i++)
        {
            if(i < index)
            {
                array2[i] = array[i];
            }else if(i > index)
            {
                array2[i-1] = array[i];
            }
        }
        System.out.println("Original array: \t"+ Arrays.toString(array));
        System.out.println("New array: \t\t\t"+Arrays.toString(array2));
    }
}
